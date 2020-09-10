<?php

use Illuminate\Http\Request;

Route::get('/users', 'Api\LoginController@index');
Route::get('/getPosts/{id}', 'Api\HomeController@getPosts');
