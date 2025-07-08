<?php

use App\Http\Controllers\ProductApiController;
use App\Http\Controllers\AuthApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(ProductApiController::class)->group(function (){
    Route::middleware('isAuth')->group(function (){
    Route::get("/products","index");
    Route::post("/products","store");
    Route::get("/products/{id}","show");
    Route::put("/products/{id}","update");
    Route::delete("/products/{id}","delete");
});
});

Route::controller(AuthApiController::class)->group(function (){

    Route::post("/register" , "register");
        Route::post("/login" , "login");
        Route::post("/logout" , "logout");
});
