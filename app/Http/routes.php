<?php

Route::group(['prefix'=>'api'],function()
{

    Route::post('auth/register', 'Auth\AuthController@postRegister');

    Route::post('auth/login', 'Auth\AuthController@postLogin');

    Route::post('auth/forgotpassword', 'Auth\RemindersController@postRemind');

    //Create new user
    Route::get('users/create/{name}/{username}/{email}/{password}', 'TestController@createUser');
    Route::get('users/refer/{referral_id}/{user_id}', 'TestController@referUser');
    Route::get('users/up/{user_id}', 'TestController@getUpChain');
    Route::get('users/down/{user_id}', 'TestController@getDownChain');


    Route::get('trialpay/process', 'TestController@trialpay');
});

/*
 * Might need to create a service provider for these
 */
//App::missing(function()
//{
//    return view('master')->with('window', new App\Helpers\JSHelper );
//});
//
//App::after(function($request, $response)
//{
//    if($response instanceof \Illuminate\Http\JsonResponse)
//    {
//        $json = ")]}',\n" . $response->getContent();
//        return $response->setContent($json);
//    }
//});