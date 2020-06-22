<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/install', 'WebController@Admin');
//Account Routes
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
            Route::get('/Setting', 'SiteController@SiteSetting');
            Route::post('/UpdateSiteIcon', 'SiteController@UpdateSiteIcon');
            Route::get('/UpdateSiteSetting/{ID}', 'WebController@UpdateSiteSetting');
            Route::post('/UpdateSiteGeneral', 'SiteController@UpdateSiteGeneral');
            Route::post('/UpdateSiteSocial', 'SiteController@UpdateSiteSocial');
        });
        //Users Routes
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
            Route::get('/Upgrade', 'UsersController@Upgrade');
            Route::post('/UpgradeToSupervisor', 'AccessLevelManagerController@UpgradeToSupervisor');
            Route::post('/UpgradeToManager', 'AccessLevelManagerController@UpgradeToManager');
            Route::post('/UpgradeToLotteryOwner', 'AccessLevelManagerController@UpgradeToLotteryOwner');
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
            Route::get('/Create', 'LotteryController@Add');
            Route::post('/Create', 'LotteryController@Create');
            Route::get('/UncheckedLottery', 'LotteryController@UnChecked');
            Route::get('/ImportLottery/{UnckeckedLotteryID}', 'LotteryController@GetLottery');
            Route::get('/Edit/{LotteryID}', 'LotteryController@Edit');
            Route::post('/ImportLottery/{UnckeckedLotteryID}', 'LotteryController@Import');
            Route::get('/DadeKavi', 'LotteryController@DadeKavi');
            Route::post('/DadeKaviPost', 'LotteryController@DadeKaviPost');

            Route::group(['prefix' => 'Category'], function () {
                Route::get('/All', 'LatteryCategoryController@All');
                Route::get('/Add', 'LatteryCategoryController@Add');
                Route::post('/Add', 'LatteryCategoryController@Create');
                Route::get('/Edit/{ID}', 'LatteryCategoryController@Edit');
                Route::put('/Edit/{ID}', 'LatteryCategoryController@Update');
                Route::get('/Delete/{ID}', 'LatteryCategoryController@Delete');
            });
        });
        //Shop Routes
        Route::group(['prefix' => 'Shop'], function () {
            Route::get('/All', 'ShopController@All');
            Route::get('/Add', 'ShopController@Add');
            Route::post('/Add', 'ShopController@Create');
            Route::get('/Edit/{ID}', 'ShopController@Edit');
            Route::put('/Edit/{ID}', 'ShopController@Update');
            Route::get('/Delete/{ID}', 'ShopController@Delete');

            Route::group(['prefix' => 'Category'], function () {
                Route::get('/All', 'ShopCategoryController@All');
                Route::get('/Add', 'ShopCategoryController@Add');
                Route::post('/Add', 'ShopCategoryController@Create');
                Route::get('/Edit/{ID}', 'ShopCategoryController@Edit');
                Route::put('/Edit/{ID}', 'ShopCategoryController@Update');
                Route::get('/Delete/{ID}', 'ShopCategoryController@Delete');
            });
        });
        //Home Lottery Routes
        Route::group(['prefix' => 'HomeLottery'], function () {
            Route::get('/All', 'HomeLotterryController@All');
            Route::get('/Add', 'HomeLotterryController@Add');
            Route::post('/Add', 'HomeLotterryController@Create');
            Route::get('/Edit/{ID}', 'HomeLotterryController@Edit');
            Route::put('/Edit/{ID}', 'HomeLotterryController@Update');
            Route::get('/Delete/{ID}', 'HomeLotterryController@Delete');
        });
        //Link Trade Routes
        Route::group(['prefix' => 'LinkTrade'], function () {
            Route::get('/All', 'LinkTradeController@All');
            Route::get('/Add', 'LinkTradeController@Add');
            Route::post('/Add', 'LinkTradeController@Create');
            Route::get('/Edit/{ID}', 'LinkTradeController@Edit');
            Route::put('/Edit/{ID}', 'LinkTradeController@Update');
            Route::get('/Delete/{ID}', 'LinkTradeController@Delete');
        });
        //Ads Routes
        Route::group(['prefix' => 'Ads'], function () {
            Route::get('/All', 'AdsController@All');
            Route::get('/Add', 'AdsController@Add');
            Route::post('/Add', 'AdsController@Create');
            Route::get('/Edit/{ID}', 'AdsController@Edit');
            Route::put('/Edit/{ID}', 'AdsController@Update');
            Route::get('/Delete/{ID}', 'AdsController@Delete');
        });
        //Win Without Lottery Routes
        Route::group(['prefix' => 'WinWithOutLottery'], function () {
            Route::get('/All', 'WwalController@All');
            Route::get('/Add', 'WwalController@Add');
            Route::post('/Add', 'WwalController@Create');
            Route::get('/Edit/{ID}', 'WwalController@Edit');
            Route::put('/Edit/{ID}', 'WwalController@Update');
            Route::get('/Delete/{ID}', 'WwalController@Delete');
        });
    });
});
Route::get('/', 'HomeController@index');
