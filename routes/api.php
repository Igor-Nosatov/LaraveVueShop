<?php

use Illuminate\Http\Request;

Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::get('/', 'HomeController@index');
Route::get('/shop', 'ShopController@index');
Route::get('/shop/search', 'ShopController@search');
Route::get('/category/{shop}', 'ShopController@category');
Route::get('/product/{product}', 'ProductController@show');

Route::post('/order/add','OrderController@store');
Route::post('/wishlist/add','WishlistController@store');
Route::get('/order','OrderController@index');
Route::get('/wishlist','WishlistController@index');
Route::delete('/wishlist/delete/{id}', 'WishlistController@delete');

Route::get('/product/review','ReviewController@index');
Route::get('/product/comment','CommentController@index');
Route::post('/product/review/add','ReviewController@store');
Route::post('/product/comment/add','CommentController@store');
