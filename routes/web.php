<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ProductController;
use App\Models\Product;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products','App\Http\Controllers\ProductController@index2');

Route::get('/products/{product}','App\Http\Controllers\ProductController@show2');

Route::post('/products','App\Http\Controllers\ProductController@store2');

Route::put('/products/{product}','App\Http\Controllers\ProductController@update2');

Route::delete('/products/{product}','App\Http\Controllers\ProductController@destroy2');

Route::get('/products/create', function () {
    return view('products.create');
});

