<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\User\UserDashBoardComponent;
use App\Http\Livewire\Admin\AdminDashBoardComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\EachProduct;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',HomeComponent::class);

Route::get('/shop',ShopComponent::class);

Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');

Route::get('/checkout',CheckoutComponent::class);
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
  //  return view('dashboard');
//})->name('dashboard');
//for user or customer
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
  Route::get('user/dashboard/',UserDashBoardComponent::class)->name('user.dashboard');

});

//for admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){

  Route::get('admin/dashboard/',AdminDashBoardComponent::class)->name('admin.dashboard');
});

Route::get('/blog',BlogComponent::class);
Route::get('/blog/{slug}',EachProduct::class)->name('blog.details');
