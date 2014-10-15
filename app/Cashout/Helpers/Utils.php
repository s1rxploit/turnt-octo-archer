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

}