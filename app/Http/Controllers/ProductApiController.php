<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductApiController extends Controller
{
    public function index()
    {
        $products = Product::all();
        if($products->isEmpty()){
            return response()->json([
                "message" => "No products found"
            ],404);
        }
        return ProductResource::collection($products);
    }

    public function show($id){
        $product = Product::find($id);
        if($product != null){
            return new ProductResource($product);
        }
        return response()->json([
            "message" => "Product not found"
        ], 404);
    }
    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            "name" => "required|min:3|string",
            "desc" => "required|string|min:20",
            "price" => "required|numeric|between:10,1000",
            "quantity" => "required|numeric|min:1|max:50",
            "image" => "required|mimes:png,jpg,jpeg|image|max:1500"
        ]);
        if($validate->fails()){
            return response()->json([
                "message" => "Validation Error",
                "errors" => $validate->errors()
            ], 422);
        }
        $image = Storage::putFile("products", $request->image);
        Product::create([
            "name" => $request->name,
            "desc" => $request->desc,
            "price" => $request->price,
            "quantity" => $request->quantity,
            "image" => $image
        ]);
        return response()->json([
            "msg"=>"Product Added Successfully"
        ],201);
    }
    public function update(Request $request, $id){
        $product = Product::find($id);
        if($product == null){
            return response()->json([
                "message" => "Product Not Found",
            ],404);
        }
        $validate = Validator::make($request->all(),[
            "name" => "min:3|string",
            "desc" => "string|min:20",
            "price" => "numeric|between:10,1000",
            "quantity" => "numeric|min:1|max:50",
            "image" => "mimes:png,jpg,jpeg|image|max:1500"
        ]);
        if($validate->fails()){
            return response()->json([
                "message" => "Validation Error",
                "errors" => $validate->errors()
            ], 422);
        }
        $image = $product->image;
        if($request->has("image")){
            Storage::delete('products/' . $product->image);
            $image = Storage::putFile('products', $request->image);
        }
        $product->update([
            "name" => $request->name,
            "desc" => $request->desc,
            "price" => $request->price,
            "quantity" => $request->quantity,
            "image" => $image
        ]);
        return response()->json([
            "message" => "Product Updated Successfully"
        ], 200);

    }
    public function delete($id){
        $product = Product::find($id);
        if($product == null){
            return response()->json([
                "message" => "Product Not Found"
            ], 404);
        }
        Storage::delete('products/' . $product->image);
        $product->delete();
        return response()->json([
            "message" => "Product Deleted Successfully"
        ], 200);
    }
}
