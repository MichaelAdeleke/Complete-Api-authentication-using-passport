<?php
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Str;
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
Route::get('/','ThreadController@index');
Route::get('/home', 'ThreadController@index')->name('home');
Route::get('/threads/create','ThreadController@create');
Route::post('threads','ThreadController@store');
Route::get('/threads','ThreadController@index');
Route::get('/threads/{channel}/{thread}','ThreadController@show');
Route::delete('threads/{channel}/{thread}','ThreadController@destroy');
Route::post('/threads/{channel}/{thread}/replies','ReplyController@store');
Route::get('threads/{channel}','ThreadController@index');
Route::post('/replies/{reply}/favorites','FavoriteController@store');
Route::get('/profiles/{user}','ProfilesController@show');
Route::delete('/replies/{reply}','ReplyController@destroy');
Route::patch('/replies/{reply}','ReplyController@update');
Route::post('/threads/{channel}/{thread}/subscriptions','ThreadSubscriptionsController@store')->middleware('auth');
Route::delete('/threads/{channel}/{thread}/subscriptions','ThreadSubscriptionsController@destroy')->middleware('auth');
Route::delete('/profiles/{user}/notifications/{notification}','UserNotificationsController@destroy');
Route::get('/profiles/{user}/notifications','UserNotificationsController@index');
Route::post('api/users/{user}/avatar','Api\UserAvatarController@store');
Route::post('/upload','ImageController@store');
Route::get('/upload','ImageController@image');


Auth::routes();

Route::get('/home','HomeController@index')->name('home');
