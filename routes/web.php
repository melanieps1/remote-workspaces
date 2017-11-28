<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/components', 'HomeController@components')->name('components');

Route::post('/results', 'HomeController@search')->name('results');