<?php

Route::group(['prefix'=>'api'],function()
{

    Route::post('auth/register', 'AuthController@postRegister');

    Route::post('auth/login', 'AuthController@postLogin');

    Route::post('auth/forgotpassword', 'Auth\RemindersController@postRemind');
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