<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'panel'], function () {
    Route::get('/', 'WebController@index');
    Route::group(['prefix' => 'User'], function () {
        //User Operations goes here
    });

    //Blog Routes
    Route::group(['prefix' => 'Blog'], function () {
        //Show Posts
        Route::get('/AllPosts', 'BlogController@ShowPosts');
        //return createpost view
        Route::get('/CreatePost', 'BlogController@CreatePost');
        //store post
        Route::post('/CreatePost', 'BlogController@StorePost');
        //return edit post view
        Route::get('/EditPost/{PostID}', 'BlogController@EditPost');
        //Update post
        Route::put('/EditPost/{PostID}', 'BlogController@UpdatePost');
        //Delete Post
        Route::get('/DeletePost/{PostID}', 'BlogController@DeletePost');

        //Show All Tags
        Route::get('/AllTags', 'BlogController@ShowTags');
        //return createTag view
        Route::get('/CreateTag', 'BlogController@CreateTag');
        //Store new Tag
        Route::post('/CreateTag', 'BlogController@StoreTag');
        //Return edittag view
        Route::get('/EditTag/{TagID}', 'BlogController@EditTag');
        //Update Tag
        Route::put('/EditTag/{TagID}', 'BlogController@UpdateTag');
        //Delete Tag
        Route::get('/DeleteTag/{TagID}', 'BlogController@DeleteTag');
    });

    //Lottery Routes
    Route::group(['prefix' => 'Lottery'], function () {
        //Show All Lottery
        Route::get('/AllLottery', 'LotteryController@AllLottery');
        //Create Lottery
        Route::get('/Create', 'LotteryController@Create');
        //Show All Unchecked Lottery
        Route::get('/UncheckedLottery', 'LotteryController@UnChecked');
        //Show One Unchecked Lottery
        Route::get('/ImportLottery/{UnckeckedLotteryID}', 'LotteryController@GetLottery');


    });

});
Route::get('/', 'HomeController@index');


Route::get('/home', 'HomeController@index')->name('home');
