<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


Route::get("/chageLang/{lang}", function($lang){
    if($lang && $lang == "ar"){
        session()->put("lang" , "ar");
    }else{
        session()->put("lang" , "en");
    }
    return redirect()->back();
})->name("changeLang");


Route::middleware(['auth:sanctum' , 'verified',])->group(function () {
    Route::get("/redirect",[AuthController::class,"redirect"])->name('redirect');
});


Route::controller(ProductController::class)->group(function (){
    Route::middleware(['auth:sanctum' , 'verified', 'isAdmin'])->group(function () {
    Route::get("/admin/products","index")->name("products.index");
    Route::get("/admin/products/create","create")->name("products.create");
    Route::post("/admin/products","store")->name("products.store");
    Route::get("/admin/products/{id}","show")->name("products.show");
    Route::get("/admin/products/{id}/edit","edit")->name("products.edit");
    Route::put("/admin/products/{id}","update")->name("products.update");
    Route::delete("/admin/products/{id}","delete")->name("products.delete");
    });
});


Route::controller(UserController::class)->group(function(){
    Route::middleware(['auth:sanctum' , 'verified'])->group(function () {
        Route::get('/user/products', 'index')->name('user.products');
        Route::get('/user/products/search', 'search')->name('user.product.search');
        Route::get('/user/products/myCart' , 'myCart')->name("user.product.myCart");
        Route::get('/user/products/{id}', 'show')->name('user.product.show');
        Route::post('/user/products/addToCart/{id}' , 'addToCart')->name('user.product.addToCart');
        Route::delete('/user/products/deleteCart/{id}' , 'deleteCart')->name('user.product.deleteCart');
        Route::put('/user/products/updateCart/{id}' , 'updateCart')->name('user.product.updateCart');
        Route::post('/user/products/makeOrder','makeOrder')->name('user.product.makeOrder');
        Route::post('/user/products/addToFavorites/{id}' , 'addToFavorites')->name('user.product.addToFavorites');
        // Route::get('/user/products/orderMail', 'orderMail')->name('user.product.orderMail');
    });
});