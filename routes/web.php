<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');

Route::get('/components', 'HomeController@components')->name('components');

Route::post('/results', 'HomeController@index')->name('results');