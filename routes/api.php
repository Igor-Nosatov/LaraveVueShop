<?php

use Illuminate\Http\Request;

Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::get('/', 'HomeController@index');
Route::get('/shop', 'ShopController@index');
Route::post('/shop', 'ShopController@index');
Route::get('/shop/search', 'ShopController@search');
Route::get('/category/{shop}', 'ShopController@category');
Route::get('/products', 'ProductController@index');
Route::get('/product/{product}', 'ProductController@show');
<<<<<<< 83179ce5584507dc6f7ebeecf2dbf8727a1e4026
Route::post('/order/add/{id}','OrderController@store');
Route::post('/wishlist/add{id}','WishlistController@store');
=======


Route::post('/order/add','OrderController@store');
Route::post('/wishlist/add','WishlistController@store');
>>>>>>> make add and wish button
Route::get('/order','OrderController@index');
Route::get('/wishlist','WishlistController@index');
