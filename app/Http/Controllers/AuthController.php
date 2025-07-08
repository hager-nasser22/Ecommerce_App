<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function redirect(){
        if(Auth::user()->role == "user"){
            $products = Product::limit(8)->get();
            $totalQuantity = 0;
    $numFavorites = 0;

            if(session()->has("cart")){
                $cart = session()->get("cart");
                // dd($cart);
                foreach($cart as $itemCart){
                    $totalQuantity += $itemCart["quantity"];
                }
            }
            if (Auth::check()) {
            $user = Auth::user();
            $numFavorites = Favorite::where('user_id', $user->id)->count();
        }
            return view('user.home', compact('products', 'totalQuantity' , 'numFavorites'));
        }else{
            return view("admin.dashboard");
        }
    }
}
