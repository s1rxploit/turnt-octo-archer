<?php

return [
    'site_name' => 'Slim',
    'url' => [
        'current' => URL::current(),
        'full' => URL::full(),
        'site' => URL::to("/"),
        'api' => URL::to("api"),
        'assets' => URL::to("assets"),
    ],
    'csrf_token' => csrf_token(),
    'user' => Illuminate\Support\Facades\Auth::user(),
    'authorized' => Illuminate\Support\Facades\Auth::check()
];