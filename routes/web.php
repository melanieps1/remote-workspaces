<?php

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');

Route::post('/workspaces/search', 'WorkspaceController@search');

Route::resource('/workspaces', 'WorkspaceController');