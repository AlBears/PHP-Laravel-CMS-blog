<?php

Route::get('/', [
  'uses' => 'BlogController@index',
  'as' => 'blog'
]);

Route::get('/blog/{post}', [
  'uses' => 'BlogController@show',
  'as' => 'blog.show'
]);

Route::get('/category/{category}', [
  'uses' => 'BlogController@category',
  'as' => 'category'
]);

Route::get('/author/{author}', [
  'uses' => 'BlogController@author',
  'as' => 'author'
]);

Auth::routes();

Route::get('/home', 'Backend\HomeController@index');
