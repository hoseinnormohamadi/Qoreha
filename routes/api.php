<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login', 'ApiController@authenticate');

Route::group(['prefix' => '/v1'], function() {
    //Sliders
    Route::get('/Slider','ApiController@Slider');
    //Last Lotterys
    Route::get('/GetLottery/{Count}','ApiController@GetLottery');
    //Search Lotterys
    Route::get('/SearchLottery/{Data}','ApiController@SearchLottery');
    //Get Category
    Route::get('/GetCategory','ApiController@GetCategory');
    //store Post in queue
    Route::post('/StorePostWithQueue', 'ApiController@StorePostWithQueue');
    //store post directly
    Route::post('/StorePost', 'ApiController@StorePost');
});


Route::group(['middleware' => ['jwt.verify'],'prefix' => '/v1'], function() {
    //Test Api Health
    Route::get('/ApiHealth','ApiController@ApiHealth');
    //store Post in queue
    Route::post('/StorePostWithQueue', 'ApiController@StorePostWithQueue');
    //store post directly
    Route::post('/StorePost', 'ApiController@StorePost');
});


//Route::post('/login','ApiController@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
