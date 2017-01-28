<?php

Route::get('/', [
  'uses' => 'BlogController@index',
  'as' => 'blog'
]);

Route::get('/blog/show', function () {
    return view('blog.show');
});
