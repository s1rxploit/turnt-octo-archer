<?php

Route::group(['prefix'=>'api'],function()
{

    Route::group(['prefix'=>'auth'],function()
    {
        Route::post('register', 'AuthController@postRegister');
        Route::get('login', 'AuthController@postLogin');
        Route::get('facebook', 'AuthController@signInWithFacebook');
    });

    Route::group(['prefix'=>'notifications'],function()
    {
        Route::get('archive/{notification_id}', 'HomeController@archiveNotification');
        Route::get('create/{user_id}/{message}', 'HomeController@createNotification');
        Route::get('all', 'HomeController@allNotifications');
        Route::get('active', 'HomeController@activeNotifications');
        Route::get('archived', 'HomeController@archivedNotifications');
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
    dd(Auth::getUser());
});

App::missing(function()
{
    return View::make('master')->with('window', new \Cashout\Helpers\JSHelper );
});

//App::after(function($request, $response)
//{
//    if($response instanceof \Illuminate\Http\JsonResponse)
//    {
//        $json = ")]}',\n" . $response->getContent();
//        return $response->setContent($json);
//    }
//});