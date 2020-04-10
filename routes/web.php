<?php

use Illuminate\Support\Facades\Route;


Route::get('/','WebController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin','WebController@index');
