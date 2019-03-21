<?php


Route::get('/{any}', function () {  return view('app'); })->where('any', '.*');

//Route::get('/product/{product}', 'ProductController@show');
