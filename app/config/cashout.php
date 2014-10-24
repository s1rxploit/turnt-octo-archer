<?php

return [
    'coins_per_dollar' => 100, //DO NOT CHANGE AFTER LAUNCH
    'min_withdraw' => 10,
    'pusher_app_id' => '94151',
    'pusher_app_key' => 'ca8b38b16e0db7523da7',
    'pusher_app_secret' => 'bffd7a1cf895e3e9f970',
    'user_chat_channel' => Auth::check() ? 'user-'.Auth::user()->id : 'user-guest-'.Session::getId(),
];