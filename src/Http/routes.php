<?php

Route::view('/', 'admin::home');

Route::post('/media/fetch', 'MediaController@fetch');
Route::post('/media', 'MediaController@store');

Route::post('/upload', 'UploadController@store');
