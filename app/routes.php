<?php

Route::get('/', 'AuthController@getLogin');
Route::get('/trial_pay/{user_id}/{reward_amt}', 'ReferralController@setRewards');

//Auth - Login , Register , Forgotpassword , Change password , Login with FB
Route::get('/login', 'AuthController@getLogin');
Route::get('/register', 'AuthController@getRegister');
Route::get('/register/referral/{referral_code}', 'AuthController@getReferralRegister');
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
    Route::get('/withdraw_funds', 'FinanceController@getWithdraw');
    Route::get('/withdraw_funds/all', 'FinanceController@getAllWithdrawalsRequest');
    Route::get('/cgs', 'DashboardController@showCGS');
    Route::get('notifications/archive/{notification_id}', 'DashboardController@archiveNotification');
    Route::get('referral/new', 'ReferralController@getNewReferrals');
    Route::get('referral/my_referrals', 'ReferralController@myReferrals');
    Route::get('referral/pending', 'ReferralController@pendingReferrals');
    Route::get('profile/edit', 'DashboardController@editProfile');
    Route::get('profile/change_password', 'AuthController@getChangePassword');

    Route::group(['filter' => 'csrf'], function () {
        Route::post('referral/new', 'ReferralController@postNewReferrals');
        Route::post('/withdraw_funds', 'FinanceController@postWithdraw');
        Route::post('profile/edit', 'DashboardController@updateProfile');
        Route::post('profile/change_password', 'AuthController@postChangePassword');
    });

});

Route::group(['before' => 'admin_auth','prefix'=>'admin'], function () {

    Route::get('news/add', 'AdminController@createNews');
    Route::get('news/delete/{news_id}', 'AdminNewsController@deleteNews');
    Route::get('news/update/{news_id}', 'AdminNewsController@getNewsUpdate');
    Route::get('news/all', 'AdminNewsController@allNews');

    Route::get('users/all', 'AdminUsersController@allUsers');
    Route::get('users/view/{user_id}', 'AdminUsersController@viewUserProfile');
    Route::get('users/delete/{user_id}', 'AdminUsersController@deleteUsers');
    Route::get('users/add_account', 'AdminUsersController@createAccount');
    Route::get('users/ban/{user_id}', 'AdminController@banUser');
    Route::get('users/un-ban/{user_id}', 'AdminController@unBanUser');
    Route::get('users/un-suspend/{user_id}', 'AdminController@unSuspendUser');
    Route::get('users/suspend/{user_id}/{hrs}', 'AdminController@suspendUser');

    Route::group(['filter' => 'csrf'], function () {
        Route::post('users/add_account', 'AdminUsersController@storeAccount');
        Route::post('users/update/{user_id}', 'AdminUsersController@updateUser');
        Route::post('news/add', 'AdminNewsController@storeNews');
        Route::post('news/update/{news_id}', 'AdminNewsController@postNewsUpdate');
    });

});