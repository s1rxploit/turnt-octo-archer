<?php

Route::filter('customer_auth', function() {
	//Someone is loggedin maybe admin / customer
	if (Auth::check()) {

		if (!Auth::user() -> isCustomer() && !Auth::user() -> isAdmin()) {
			return Redirect::to('/');
		}

	} else {
		return Redirect::to('/');
	}
});

Route::filter('admin_auth', function() {
	//Someone is loggedin maybe admin / customer
	if (Auth::check()) {

		if (!Auth::user() -> isAdmin()) {
			Session::flash('error_msg', 'Access denied . Contact Admin to Escalate your rights');
			return Redirect::to('/dashboard');
		}

	} else {
		return Redirect::to('/');
	}
});

Route::filter('csrf', function() {
	if (Session::token() != Input::get('_token')) {
		throw new Illuminate\Session\TokenMismatchException;
	}
});
