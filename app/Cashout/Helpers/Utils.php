<?php namespace Cashout\Helpers;

use Illuminate\Support\Facades\Log;
use DB;
use Str;

class Utils
{
   static function generateReferralCode(){

       $temp_code = Str::random(10);

       $count = DB::table('users')->where('referral_code',$temp_code)->count();

       if($count>0){
           //Code Exists
           Utils::generateReferralCode();
        }else{
            return $temp_code;
       }
   }

    static function prettyDate($date,$time=true) {
        $format = $time ? "F jS, Y" : "F jS, Y";
        return date($format,strtotime($date));
    }

    static function imageUpload($file,$folder)
    {

        $timestamp = time();
        $ext = $file->guessClientExtension();
        $name = $timestamp . "_photo." . $ext;

        if(!\File::exists(public_path() . '/uploads/'.$folder)){
            \File::makeDirectory(public_path() . '/uploads/'.$folder);
        }

        // move uploaded file from temp to uploads directory
        if ($file->move(public_path() . '/uploads/'.$folder.'/', $name)) {
            return '/uploads/'.$folder.'/'.$name;
        } else {
            return false;
        }
    }

}