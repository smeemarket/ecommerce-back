<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('admin/login', 'AuthController@showLogin');
Route::post('admin/login', 'AuthController@postLogin');
Route::get('admin/logout', 'AuthController@logout');

Route::group(['prefix' => 'admin', 'middleware' => 'AdminAuth'], function () {
    Route::get('/', 'AdminController@home');
    Route::resource('category', 'CategoryController');
    Route::resource('watch', 'WatchController');
});
