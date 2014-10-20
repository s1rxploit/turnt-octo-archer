<?php

//Customer Routes
//Customer Filter

Route::get('/','HomeController@index');
Route::get('/customer/login','AuthController@getCustomerLogin');
Route::get('/customer/facebook', 'AuthController@signInWithFacebook');
Route::get('/logout','AuthController@logout');

Route::group(['filter'=>'csrf'],function() {
    Route::post('/customer/login', 'AuthController@postLogin');
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

    Route::group(['filter'=>'csrf'],function() {
        Route::post('referral/new', 'ReferralController@storeNewReferrals');
        Route::post('profile/edit', 'HomeController@storeCustomerProfile');
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