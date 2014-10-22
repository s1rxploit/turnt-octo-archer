<?php

Route::get('/', 'AuthController@getLogin');

//Auth - Login , Register , Forgotpassword , Change password , Login with FB
Route::get('/login', 'AuthController@getLogin');
Route::get('/register', 'AuthController@getRegister');
Route::get('/forgot-password', 'AuthController@getForgotPassword');
Route::get('/reset/{email}/{code}', 'AuthController@getReset');
Route::get('/facebook', 'AuthController@signInWithFacebook');
Route::post('/trial_pay/process', 'ReferralController@trialPayResponse');
Route::get('/logout', 'AuthController@logout');

Route::group(['filter' => 'csrf'], function () {
    Route::post('/login', 'AuthController@postLogin');
    Route::post('/register', 'AuthController@postRegister');
    Route::post('/forgot-password', 'AuthController@postForgotPassword');
    Route::post('/reset/change-password', 'AuthController@postReset');
});

Route::group(['before' => 'customer_auth'], function () {

    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/earnings', 'DashboardController@startEarnings');
    Route::get('/cgs', 'DashboardController@showCGS');
    Route::get('notifications/archive/{notification_id}', 'DashboardController@archiveNotification');
    Route::get('referral/new', 'ReferralController@getNewReferrals');
    Route::get('referral/my_referrals', 'ReferralController@myReferrals');
    Route::get('referral/pending', 'ReferralController@pendingReferrals');
    Route::get('profile/edit', 'DashboardController@editProfile');
    Route::get('profile/change_password', 'AuthController@getChangePassword');

    Route::group(['filter' => 'csrf'], function () {
        Route::post('referral/new', 'ReferralController@postNewReferrals');
        Route::post('profile/edit', 'DashboardController@updateProfile');
        Route::post('profile/change_password', 'AuthController@postChangePassword');
    });

});

Route::group(['before' => 'admin_auth','prefix'=>'admin'], function () {
    Route::get('news/add', 'AdminController@createNews');
    Route::get('news/delete/{news_id}', 'AdminController@deleteNews');
    Route::get('news/update/{news_id}', 'AdminController@getNewsUpdate');
    Route::get('news/all', 'AdminController@allNews');
    Route::get('users', 'AdminController@getUsers');
    Route::get('users/ban/{user_id}', 'AdminController@banUser');
    Route::get('users/un-ban/{user_id}', 'AdminController@unBanUser');
    Route::get('users/un-suspend/{user_id}', 'AdminController@unSuspendUser');
    Route::get('users/suspend/{user_id}/{hrs}', 'AdminController@suspendUser');

    Route::group(['filter' => 'csrf'], function () {
        Route::post('profile/edit', 'AdminController@updateProfile');
        Route::post('profile/change_password', 'AdminAuthController@postChangePassword');
        Route::post('news/add', 'AdminController@storeNews');
        Route::post('news/update/{news_id}', 'AdminController@postNewsUpdate');
    });

});