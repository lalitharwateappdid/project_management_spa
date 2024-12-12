<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// controller
use App\Http\Controllers\Api\v1\Admin\Auth\AuthController;
use App\Http\Controllers\Api\v1\Admin\EmployeeController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// unprotected routes
Route::prefix("auth")->controller(AuthController::class)->group(function(){
    Route::post("login","login");
});


// protected route

Route::middleware('auth:sanctum')->group(function(){
    Route::prefix("employees")->controller(EmployeeController::class)->group(function(){
        Route::get("/","index");
        Route::post("store","store");
        Route::get("{id}","show");
        Route::put('update/{id}',"update");
        Route::put("status","status");
    });
});


