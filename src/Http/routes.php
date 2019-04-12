<?php

Route::get('/', function () {
    return 'Hello World!';
});

Route::post('/media/fetch', 'MediaController@fetch');
Route::post('/media', 'MediaController@store');

Route::post('/upload', 'UploadController@store');
