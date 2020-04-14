<?php

use Illuminate\Support\Facades\Route;
Auth::routes();

Route::group(['middleware' => 'auth','prefix' => 'panel'], function () {
    Route::get('/','WebController@index');

    //Blog Routes
    //Show Posts
    Route::get('/Blog/AllPosts','BlogController@ShowPosts');
    //return createpost view
    Route::get('/Blog/CreatePost','BlogController@CreatePost');
    //store post
    Route::post('/Blog/CreatePost','BlogController@StorePost');
    //return edit post view
    Route::get('/Blog/EditPost/{PostID}','BlogController@EditPost');
    //Update post
    Route::put('/Blog/EditPost/{PostID}','BlogController@UpdatePost');
    //Delete Post
    Route::get('/Blog/DeletePost/{PostID}','BlogController@DeletePost');


    Route::get('/Blog/AllTags','BlogController@ShowTags');
    Route::get('/Blog/CreateTag','BlogController@CreateTag');
    Route::post('/Blog/CreateTag','BlogController@StoreTag');
    Route::get('/Blog/EditTag/{TagID}','BlogController@EditTag');
    Route::put('/Blog/EditTag/{TagID}','BlogController@UpdateTag');
    Route::get('/Blog/DeleteTag/{TagID}','BlogController@DeleteTag');



});
Route::get('/','HomeController@index');



Route::get('/home', 'HomeController@index')->name('home');
