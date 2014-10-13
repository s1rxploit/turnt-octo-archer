<?php namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use DB;

class Utils
{
   static function generateReferralCode(){

       $temp_code = Utils::generateRandom();

       $count = DB::table('users')->where('referral_code',$temp_code)->count();

       if($count>0){
           //Code Exists
           Utils::generateReferralCode();
        }else{
            return $temp_code;
       }
   }

    static function generateRandom($length = 8, $strength = 4) {
        $vowels = 'aeiouy';
        $consonants = 'bcdfghjklmnpqrstvwxz';

        if ($strength & 1) {
            $consonants .= 'BCDFGHJKLMNPQRSTVWXZ';
        }
        if ($strength & 2) {
            $vowels .= "AEIOUY";
        }
        if ($strength & 4) {
            $consonants .= '23456789';
        }
        if ($strength & 8) {
            $consonants .= '@#$%';
        }

        $random = '';
        $alt = time() % 2;
        for ($i = 0; $i < $length; $i++) {
            if ($alt == 1) {
                $random .= $consonants[(rand() % strlen($consonants))];
                $alt = 0;
            } else {
                $random .= $vowels[(rand() % strlen($vowels))];
                $alt = 1;
            }
        }
        return $random;
    }
}