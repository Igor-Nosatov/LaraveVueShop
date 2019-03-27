<?php

use Illuminate\Http\Request;


Route::post('/login', 'UserController@login');
Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback','SocialController@Callback');
Route::post('/register', 'UserController@register');
Route::get('/', 'HomeController@index');
Route::get('/shop', 'ShopController@index');
Route::get('/shop/search', 'ShopController@search');
Route::get('/category/{shop}', 'ShopController@category');
Route::get('/product/review','ReviewController@index');
Route::get('/product/{product}', 'ProductController@show');
Route::get('/product/comment','CommentController@index');
Route::get('cart','CartController@index');
Route::get('/wishlist','WishlistController@index');
Route::post('/wishlist/add','WishlistController@store');
     Route::delete('/wishlist/delete/{id}', 'WishlistController@delete');
Route::get('/order','OrderController@index');
Route::get('/checkout','CheckoutController@index');

  Route::group(['middleware' => 'auth:api'], function(){
       Route::get('/users','UserController@index');
       Route::post('/product/review/add','ReviewController@store');
       Route::post('/product/comment/add','CommentController@store');
       Route::post('cart/add','CartController@store');
       Route::delete('/cart/delete/{id}', 'CartController@delete');
       Route::post('/order/add','OrderController@store');
       Route::post('/checkout/add','CheckoutController@store');
       Route::post('/contact/add','ContactController@store');
  });
