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

Route::group(['middleware' => ['jwt.verify']], function() {
    //store Post in queue
    Route::post('/StorePostWithQueue', 'ApiController@StorePostWithQueue');
    //store post directly
    Route::post('/StorePost', 'ApiController@StorePost');
});


//Route::post('/login','ApiController@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
