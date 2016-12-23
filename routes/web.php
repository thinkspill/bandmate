<?php

Route::get('/', 'BandController@index');
Route::resource('bands', 'BandController');
Route::resource('albums', 'AlbumController');
