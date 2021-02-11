<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\adminproduct;
use App\Http\Controllers\admincategory;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('login',[PassportController::class,'login']);

Route::post('register',[PassportController::class,'register']);


Route::middleware('auth:api')->group(function(){
    Route::get('user',[PassportController::class,'details']);
    
    Route::resource('products',ProductController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('ratings',RatingsController::class);
    Route::resource('customer',CustomerController::class);
    Route::resource('/adminproduct',adminproduct::class);
    Route::resource('/admincategory',admincategory::class);
});
