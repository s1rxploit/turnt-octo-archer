<?php

Route::get('/','CustomerAuthController@getLogin');

Route::group(['prefix'=>'customer'],function() {

    //Auth - Login , Register , Forgotpassword , Change password , Login with FB
    Route::get('/login','CustomerAuthController@getLogin');
    Route::get('/register','CustomerAuthController@getRegister');
    Route::get('/forgot-password','CustomerAuthController@getForgotPassword');
    Route::get('/reset/{email}/{code}','CustomerAuthController@getReset');
    Route::get('/facebook', 'CustomerAuthController@signInWithFacebook');
    Route::get('/logout','CustomerAuthController@logout');

    Route::get('/earnings', 'CustomerController@startEarnings');
    Route::get('/cgs', 'CustomerController@showCGS');

    Route::group(['filter'=>'csrf'],function() {
        Route::post('/login', 'CustomerAuthController@postLogin');
        Route::post('/register','CustomerAuthController@postRegister');
        Route::post('/forgot-password','CustomerAuthController@postForgotPassword');
        Route::post('/reset/change-password','CustomerAuthController@postReset');
    });

    Route::group(['before' => 'customer_auth'],function() {
        Route::get('/','CustomerController@index');
        Route::get('notifications/archive/{notification_id}', 'CustomerController@archiveNotification');
        Route::get('referral/new', 'ReferralController@getNewReferrals');
        Route::get('referral/my_referrals', 'ReferralController@myReferrals');
        Route::get('referral/pending', 'ReferralController@pendingReferrals');
        Route::get('profile/edit', 'CustomerController@editProfile');
        Route::get('profile/change_password', 'CustomerAuthController@getChangePassword');

        Route::group(['filter'=>'csrf'],function() {
            Route::post('referral/new', 'ReferralController@postNewReferrals');
            Route::post('profile/edit', 'CustomerController@updateProfile');
            Route::post('profile/change_password', 'CustomerAuthController@postChangePassword');
        });

    });

});

Route::group(['prefix'=>'admin'],function() {

    //Auth - Login , Register , Forgotpassword , Change password , Login with FB
    Route::get('/login','AdminAuthController@getLogin');
    Route::get('/register','AdminAuthController@getRegister');
    Route::get('/facebook', 'AdminAuthController@signInWithFacebook');
    Route::get('/logout','AdminAuthController@logout');

    Route::group(['filter'=>'csrf'],function() {
        Route::post('/login', 'AdminAuthController@postLogin');
        Route::post('/register','AdminAuthController@postRegister');
    });

    Route::group(['before' => 'admin_auth'],function() {
        Route::get('/','AdminController@index');
        Route::get('profile/edit', 'AdminController@editProfile');
        Route::get('profile/change_password', 'AdminAuthController@getChangePassword');
        Route::get('news/add', 'AdminController@createNews');
        Route::get('news', 'AdminController@allNews');
        Route::get('users', 'AdminController@getUsers');
        Route::get('users/ban/{user_id}', 'AdminController@banUser');
        Route::get('users/un-ban/{user_id}', 'AdminController@unBanUser');
        Route::get('users/un-suspend/{user_id}', 'AdminController@unSuspendUser');
        Route::get('users/suspend/{user_id}/{hrs}', 'AdminController@suspendUser');

        Route::group(['filter'=>'csrf'],function() {
            Route::post('profile/edit', 'AdminController@updateProfile');
            Route::post('profile/change_password', 'AdminAuthController@postChangePassword');
            Route::post('news/add', 'AdminController@storeNews');
        });

    });

});

Route::group(['prefix'=>'api'],function()
{
    Route::post('/trial_pay/process', 'TrialPayController@process');
});