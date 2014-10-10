<?php namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class Doc
{
    private static $log_inc = 0;

    static function useFiles($path)
    {
        Log::useFiles($path);
    }

    static function messages($v)
    {
        return implode('',$v->messages()->all('<li>:message</li>'));
    }

    static function i($arg)
    {
        Log::info(print_r($arg,true));
    }

    static function e($arg, $trace=false)
    {
        Log::error(print_r($arg,true));
        if($trace){
            Log::error(print_r(debug_backtrace()));
        }
    }

    static function w($arg)
    {
        Log::warning(print_r($arg,true));
    }

    static function s($str, $arg, $lvl = 'info')
    {
        Log::$lvl($str . ' :: ' .print_r($arg , true));
    }

    static function inc()
    {
        static::$log_inc += 1;
        Log::info(print_r(['Now at:' => static::$log_inc],true));
    }
}