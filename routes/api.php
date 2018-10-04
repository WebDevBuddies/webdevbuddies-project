<?php

use Illuminate\Http\Request;

Route::post('auth/login', 'AuthController@login');
Route::post('auth/register', 'AuthController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('user/me', 'UserController@me');
    Route::resource('user', 'UserController', ['except' => ['create', 'store', 'edit']]);
});
