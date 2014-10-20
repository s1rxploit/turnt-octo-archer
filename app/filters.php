<?php

Route::filter('customer_auth', function()
{
    //Someone is loggedin maybe admin / customer
    if(Auth::check()){

        $userManager = new KodeInfo\UserManagement\UserManagement(Auth::user()->id);

        if(!$userManager->user->isCustomer()){
            return Redirect::to('/');
        }

    }else{
        return Redirect::to('/');
    }
});

Route::filter('admin_auth', function()
{
    //Someone is loggedin maybe admin / customer
    if(Auth::check()){

        $userManager = new KodeInfo\UserManagement\UserManagement(Auth::user()->id);

        if(!$userManager->user->isAdmin()){
            return Redirect::to('/');
        }

    }else{
        return Redirect::to('/');
    }
});

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
