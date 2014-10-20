<?php

//Customer Routes
//Customer Filter

Route::get('/test',function(){
    dd(\Carbon\Carbon::now());
});

Route::get('/','HomeController@index');
Route::get('/customer/login','AuthController@getCustomerLogin');
Route::get('/customer/register','AuthController@getCustomerRegister');
Route::get('/customer/forgot-password','AuthController@getCustomerForgotPassword');
Route::get('/customer/reset/{email}/{code}','AuthController@getCustomerReset');
Route::get('/customer/facebook', 'AuthController@signInWithFacebook');
Route::get('/logout','AuthController@logout');

Route::group(['filter'=>'csrf'],function() {
    Route::post('/customer/login', 'AuthController@postLogin');
    Route::post('/customer/register','AuthController@postCustomerRegister');
    Route::post('/customer/forgot-password','AuthController@postCustomerForgotPassword');
    Route::post('/customer/reset/change-password','AuthController@postCustomerResetNewPassword');
    Route::post('/admin/login', 'AuthController@postLogin');
});


Route::group(['prefix'=>'customer','before' => 'customer_auth'],function()
{
    Route::get('/','HomeController@customerIndex');

    //Archive a notification
    Route::get('notifications/archive/{notification_id}', 'HomeController@archiveNotification');
    Route::get('referral/new', 'ReferralController@createNewReferrals');
    Route::get('referral/my_referrals', 'ReferralController@myReferrals');
    Route::get('referral/pending', 'ReferralController@pendingReferrals');
    Route::get('profile/edit', 'HomeController@editCustomerProfile');
    Route::get('profile/change_password', 'HomeController@getChangePassword');

    Route::group(['filter'=>'csrf'],function() {
        Route::post('referral/new', 'ReferralController@storeNewReferrals');
        Route::post('profile/edit', 'HomeController@storeCustomerProfile');
        Route::post('profile/change_password', 'HomeController@storeChangePassword');
    });
});


Route::group(['prefix'=>'api'],function()
{

    Route::group(['prefix'=>'auth'],function()
    {
        Route::post('register', 'AuthController@postRegister');
        Route::get('login', 'AuthController@postLogin');
        Route::get('facebook', 'AuthController@signInWithFacebook');
    });

    Route::group(['prefix'=>'trial_pay'],function()
    {
        Route::post('process', 'TrialPayController@process');
    });
});