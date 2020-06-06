<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['prefix' => 'Account'], function () {
    Route::get('/ActivateAccount', 'UsersController@verifyAccount');
    Route::post('/ActivateAccount', 'UsersController@VerifyAccountByPhone');
    Route::post('/SendActivationCode', 'UsersController@SendActivationCode');
});
Route::group(['middleware' => 'auth', 'prefix' => 'panel'], function () {
    Route::group(['middleware' => 'AccountActivationCheck'], function () {
        Route::get('/', 'WebController@index');
        //Site Routes
        Route::group(['prefix' => 'Site'], function () {
            Route::get('/Setting','SiteController@SiteSetting');
            Route::post('/UpdateSiteIcon','SiteController@UpdateSiteIcon');
            Route::post('/UpdateSiteGeneral','SiteController@UpdateSiteGeneral');
        });
        Route::group(['prefix' => 'Users'], function () {
            Route::get('/All', 'UserController@All');
            Route::get('/Add', 'UserController@Create');
            Route::get('/ManageRequest', 'UserController@ManageRequest');
            Route::post('/Add', 'UserController@Add');
            Route::get('/ShowProfile/{UserID}', 'UserController@ShowOne');
            Route::get('/ShowRequest/{UserID}', 'UserController@ShowRequest');
            Route::post('/ProcessRequest/{RequestID}', 'UserController@ProcessRequest');
            Route::get('/Edit/{UserID}', 'UserController@Edit');
            Route::put('/Edit/{UserID}', 'UserController@Update');
            Route::get('/Delete/{UserID}', 'UserController@DeleteUser');
            Route::get('/DeleteRequest/{RequestID}', 'UserController@DeleteRequest');

        });
        //Auth User Routes
        Route::group(['prefix' => 'User'], function () {
            Route::get('/Profile', 'UsersController@Profile');
            Route::post('/UpdatePic', 'UsersController@UpdatePic');
            Route::post('/UpdateUserInfo', 'UsersController@UpdateUserInfo');
            Route::post('/UpdatePassword', 'UsersController@UpdatePassword');
            Route::get('/Upgrade','UsersController@Upgrade');
            Route::post('/UpgradeToSupervisor','AccessLevelManagerController@UpgradeToSupervisor');
            Route::post('/UpgradeToManager','AccessLevelManagerController@UpgradeToManager');
            Route::post('/UpgradeToLotteryOwner','AccessLevelManagerController@UpgradeToLotteryOwner');
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
            Route::get('/AllLottery', 'LotteryController@AllLottery');
            Route::get('/Create', 'LotteryController@Create');
            Route::get('/UncheckedLottery', 'LotteryController@UnChecked');
            Route::get('/ImportLottery/{UnckeckedLotteryID}', 'LotteryController@GetLottery');
            Route::get('/Edit/{LotteryID}', 'LotteryController@GetLottery');
            Route::post('/ImportLottery/{UnckeckedLotteryID}', 'LotteryController@Import');
            Route::get('/DadeKavi', 'LotteryController@DadeKavi');
            Route::post('/DadeKaviPost', 'LotteryController@DadeKaviPost');

            Route::group(['prefix' => 'Category'] , function (){
                Route::get('/All','LotteryController@CategoryAll');
                Route::get('/Add','LotteryController@CategoryAdd');
                Route::post('/Add','LotteryController@Categorycreate');
                Route::get('/Edit/{ID}','LotteryController@CategoryEdit');
                Route::put('/Edit/{ID}','LotteryController@CategoryUpdate');
            });
        });
    });
});
Route::get('/', 'HomeController@index');
