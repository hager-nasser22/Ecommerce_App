<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\FuncCall;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(7);
        return view('admin.product.all', ["products" => $products]);
    }
    public function create()
    {
        return view("admin.product.create");
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|min:3|string",
            "desc" => "required|string|min:20",
            "price" => "required|numeric|between:10,1000",
            "quantity" => "required|numeric|min:1|max:50",
            "image" => "required|mimes:png,jpg,jpeg|image|max:1500"
        ]);
        $data["image"] = Storage::putFile("products", $request->image);
        Product::create($data);
        return redirect()->action([ProductController::class, "index"]);
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view("admin.product.show", ["product" => $product]);
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view("admin.product.edit", ["product" => $product]);
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->validate([
            "name" => "required|min:3|string",
            "desc" => "required|string|min:20",
            "price" => "required|numeric|between:10,1000",
            "quantity" => "required|numeric|min:1|max:50",
            "image" => "mimes:png,jpg,jpeg|image|max:1500"
        ]);
        $image = $product->image;
        if ($request->has("image")) {
            Storage::delete($product->image);
            $image = Storage::putFile("products", $request->image);
        }
        $data["iamge"] = $image;
        $product->update($data);
        return redirect()->action([ProductController::class, "index"]);
    }
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();
        return redirect()->action([ProductController::class, "index"]);
    }
}
