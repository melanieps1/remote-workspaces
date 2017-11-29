<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');

// Route::post('/workspaces/results', 'WorkspaceController@index')->name('results');
// Delete above route once I'm sure I've replaced all references to it!

Route::post('/workspaces/search', 'WorkspaceController@search');

Route::resource('/workspaces', 'WorkspaceController');