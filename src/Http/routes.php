<?php

use PawelMysior\Admin\Http\Middleware\CheckIsAdmin;

Route::get('/login', 'LoginController@showLoginForm')->name('login');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout')->name('logout');

Route::middleware(['auth', CheckIsAdmin::class])->group(function () {
    Route::view('/', 'admin::home');

    Route::post('/media/fetch', 'MediaController@fetch');
    Route::post('/media', 'MediaController@store');
    Route::post('/media/delete', 'MediaController@destroy');

    Route::post('/upload', 'UploadController@store');
});
