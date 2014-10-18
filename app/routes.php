<?php

//Customer Routes
//Customer Filter
Route::group(['prefix'=>'customer'],function()
{
    Route::get('/','HomeController@customerIndex');

    //Archive a notification
    Route::get('notifications/archive/{notification_id}', 'HomeController@archiveNotification');
});


Route::get('/customer/login','AuthController@getCustomerLogin');

Route::group(['filter'=>'csrf'],function() {
    Route::post('/customer/login', 'AuthController@postLogin');
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

Route::get('ok', function(){
    dd(Session::all());
});

Route::get('auth_user', function(){
    dd(Auth::user());
});

Route::get('logout', function(){
    Auth::logout();
    Session::flush();
});

//App::after(function($request, $response)
//{
//    if($response instanceof \Illuminate\Http\JsonResponse)
//    {
//        $json = ")]}',\n" . $response->getContent();
//        return $response->setContent($json);
//    }
//});