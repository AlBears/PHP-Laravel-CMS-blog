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

Route::put('/backend/blog/restore/{blog}', [
  'uses' => 'Backend\BlogController@restore',
  'as' => 'backend.blog.restore'
]);

Route::delete('/backend/blog/force-destroy/{blog}', [
  'uses' => 'Backend\BlogController@forceDestroy',
  'as' => 'backend.blog.force-destroy'
]);

Route::resource('/backend/blog', 'Backend\BlogController', [
  'as' => 'backend'
]);
