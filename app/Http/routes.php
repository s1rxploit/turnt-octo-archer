<?php

Route::group(['prefix'=>'api'],function()
{

    Route::post('auth/register', 'Auth\AuthController@postRegister');

    Route::post('auth/login', 'Auth\AuthController@postLogin');

    Route::post('auth/forgotpassword', 'Auth\RemindersController@postRemind');
});

//App::missing(function()
//{
//    return view('master')->with('window', new App\Helpers\JSHelper );
//});

//App::after(function($request, $response)
//{
//    if($response instanceof \Illuminate\Http\JsonResponse)
//    {
//        $json = ")]}',\n" . $response->getContent();
//        return $response->setContent($json);
//    }
//});