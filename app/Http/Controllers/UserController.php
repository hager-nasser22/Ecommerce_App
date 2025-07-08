<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public $totalQuantity;
    public $numFavorites = 0;
    public $totalPrice = 0;
    public $tax = 30; // Assuming a fixed tax amount for simplicity
    public $totalFinalPrice = 0;
    public function __construct()
    {
        $this->totalQuantity = 0;
        if (session()->has("cart")) {
            $cart = session()->get("cart");
            foreach ($cart as $itemCart) {
                $this->totalQuantity += $itemCart["quantity"];
            }
            $this->totalPrice = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        }
        if (Auth::check()) {
            $user = Auth::user();
            $this->numFavorites = Favorite::where('user_id', $user->id)->count();
        }
        
        $this->totalFinalPrice = $this->totalPrice + $this->tax;
        view()->share('totalQuantity', $this->totalQuantity);
        view()->share('numFavorites', $this->numFavorites);
        view()->share('totalPrice', $this->totalPrice);
        view()->share('tax', $this->tax);
        view()->share('totalFinalPrice', $this->totalFinalPrice);
    }
    public function index()
    {
        $products = Product::paginate(8);
        $totalQuantity = $this->totalQuantity;
        return view('user.products', compact('products', "totalQuantity"));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $totalQuantity = $this->totalQuantity;

        return view('user.product-details', compact('product', "totalQuantity"));
    }
    public function search(Request $request)
    {
        $searchKey = $request->search;
        $products = Product::where('name', 'like', "%$searchKey%")->paginate(8);
        $totalQuantity = $this->totalQuantity;

        return view('user.products', compact('products', "totalQuantity"));
    }
    public function addToCart(Request $request, $id)
    {
        $quantity = $request->quantity;
        $product = Product::findOrFail($id);
        $cart = session()->get("cart");
        if (! $cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "price" => $product->price,
                    "desc" => $product->desc,
                    "image" => $product->image,
                    "quantity" => $quantity,
                ],
            ];
            session()->put("cart", $cart);
            $totalQuantity = $this->totalQuantity;

            return redirect()->back()->with("success", "Product added to cart successfully");
        }
        if (isset($cart[$id])) {
            $cart[$id]["quantity"] += $quantity;
            session()->put("cart", $cart);
            $totalQuantity = $this->totalQuantity;

            return redirect()->back()->with("success", "Product quantity updated successfully");
        }
        $cart[$id] = [
            "name" => $product->name,
            "price" => $product->price,
            "desc" => $product->desc,
            "image" => $product->image,
            "quantity" => $quantity,
        ];
        session()->put("cart", $cart);
        $totalQuantity = $this->totalQuantity;

        return redirect()->back()->with("success", "Product added to cart successfully");
    }
    public function myCart()
    {
        $cart = session()->get("cart");
        $totalQuantity = $this->totalQuantity;
        return view("user.myCart", compact("cart", "totalQuantity"));
    }
    public function updateCart(Request $request , $id){
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]["quantity"] = $request->quantity;
            session()->put('cart' , $cart);
            $totalQuantity = $this->totalQuantity;
            return redirect()->back()->with("success", "Product quantity updated successfully");
        }
    }
    public function deleteCart(Request $request, $id)
    {
        $cart = session()->get("cart");
        if (isset($cart[$id])) {
            $totalQuantity = $this->totalQuantity - $cart[$id]["quantity"];
            unset($cart[$id]);
            session()->put("cart", $cart);
            return redirect()->back()->with("success", "Product removed from cart successfully");
        }
    }
    public function makeOrder(Request $request){
        $user = Auth::user();
        $cart = session()->get("cart");
        if(!$cart){
            return redirect()->back()->with("error", "Your cart is empty");
        }
        $order = Order::create([
            'user_id' => $user->id,
            'address' => $request->address,
            'phone' => $request->phone,
            'total_price' => $this->totalFinalPrice,
        ]);
        foreach ($cart as $id => $item) {
            OrderDetails::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }
        // dd($order);
                Mail::to($user->email)->send(new OrderMail($order));

        session()->forget('cart');
        return redirect()->back()->with("success", "Order placed successfully");
    }
    public function addToFavorites(Request $request , $id){
        $user = Auth::user();
        $product = Product::findOrFail($id);
        $fav = Favorite::where('user_id' , $user->id)->where('product_id' , $product->id)->first();
        if($fav){
            $fav->delete();
            return redirect()->back()->with("success", "Product removed from favorites successfully");
        }
        $fav = Favorite::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);
        return redirect()->back()->with("success", "Product added to favorites successfully");
    }
    // public function orderMail(){
    //     Mail::to(Auth::user()->email)->send(new OrderMail());
    //     return redirect()->back()->with("success", "Order mail sent successfully");
    // }
}
