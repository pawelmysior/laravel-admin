<?php

Route::get('/', function () {
    return 'Hello World!';
});

Route::post('/upload', 'UploadController@store');
