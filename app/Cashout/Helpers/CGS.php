<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 22-10-2014
 * Time: 12:56
 */

namespace Cashout\Helpers;

use Cashout\Models\User;
use Cashout\Models\UserReferral;
use Cashout\Models\UserReferralCoins;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class CGS
{

    public $chain = [];
    public $cgs_string = "";
    public $depth = 0;
    public $chain_depth = 0;


    public function getCGS($user_id)
    {

        $users = UserReferral::where('referral_id', $user_id)->where('user_id', '>', 0)->lists('user_id');

        $this->chain[$user_id] = $users;

        //[1]=>[2 ,3]
        $this->recursiveCGS($users, $this->chain[$user_id]);

        return ['cgs_array' => $this->chain, 'cgs_string' => $this->cgs_string];
    }

    public function chain_depth($arr, $n = 0)
    {

        $max = $n;

        foreach ($arr as $item) {
            if (is_array($item)) {
                $max = max($max, $this->chain_depth($item, $n + 1));
            }
        }

        return $max;
    }

    public function recursiveCGS($user_ids, &$arr)
    {

        if ($this->chain_depth($this->chain) <= 8) {

            $this->cgs_string .= "<ul>";

            // [1]=>[2,3] $arr is at [1]
            for ($i = 0; $i < sizeof($user_ids); $i++) {

                //index 2
                $users = UserReferral::where('referral_id', $user_ids[$i])->where('user_id', '>', 0)->lists('user_id');

                //index 2 users 4,5
                //by reference on 2 nd array
                $find_user = DB::table('users')->where('id', $arr[$i])->first();
                $this->cgs_string .= "<li title='Today Coins Earned : 200 \n Yesterday Coins Earned : 10'><label>$find_user->name</label>";

                unset($arr[$i]);

                $arr[$user_ids[$i]] = $users;

                if (sizeof($users) > 0) {
                    //[2]=>[4,5] reference [2]=>
                    $this->recursiveCGS($users, $arr[$user_ids[$i]]);
                }

                $this->cgs_string .= "</li>";

            }

            $this->cgs_string .= "</ul>";

        }

        return;

        /* [1] => [2=>[
                     4=>[],
                     6=>[]
                    ],
                  3=>[
                    7=>[],
                    8=>[]]
                 ]
         */


    }

    public function getAllContacts($user_id,$up=true,$down=true)
    {
        $contacts = [];

        $users = UserReferral::where('referral_id', $user_id)->where('user_id', '>', 0)->lists('user_id');

        $this->chain[$user_id] = $users;

        if($up) {

            $this->recursiveCGS($users, $this->chain[$user_id]);

            $contacts = $this->array_keys_multi($this->chain);


            if (isset($contacts[0]) && $contacts[0] == $user_id) {
                unset($contacts[0]);
            }
        }

        if($down) {
            $this->getUpChain($user_id);

            $keys = $this->chain;

            if (isset($keys[0]) && $keys[0] == $user_id) {
                unset($keys[0]);
            }

            foreach ($keys as $key) {
                $contacts[] = $key;
            }
        }

        $users = [];

        foreach($contacts as $contact){
            try{
                $users[] = User::findOrFail($contact);
            }catch(\Exception $e){
                continue;
            }
        }

        return $users;
    }

    function array_keys_multi(array $array)
    {
        $keys = array();

        foreach ($array as $key => $value) {
            $keys[] = $key;

            if (is_array($array[$key])) {
                $keys = array_merge($keys, $this->array_keys_multi($array[$key]));
            }
        }

        return $keys;
    }

    public function getContactsRecursive($user_ids, &$arr)
    {

        for ($i = 0; $i < sizeof($user_ids); $i++) {

            //index 2
            $users = UserReferral::where('referral_id', $user_ids[$i])->where('user_id', '>', 0)->lists('user_id');

            unset($arr[$i]);

            $arr[$user_ids[$i]] = $users;

            if (sizeof($users) > 0) {
                //[2]=>[4,5] reference [2]=>
                $this->recursiveCGS($users, $arr[$user_ids[$i]]);
            }

        }

        return;
    }

    public function getUpChain($user_id)
    {

        //Find if any one referred this user if yes always will be only 1
        $user = UserReferral::where('user_id', $user_id)->first();

        if (!empty($user)) {

            array_push($this->chain, $user->user_id);

            $this->depth++;

            //User have a referral .
            if ($user->referral_id > 0)
                $this->getUpChain($user->referral_id);

        } else {

            //this was first user who started referral system
            array_push($this->chain, $user_id);

            array_splice($this->chain, 0, 1);

            return;
        }
    }

    public static function calculateCash($coins)
    {
        //$1 = 100 Coins

        $coins_per_dollar = \Config::get('cashout.coins_per_dollar');

        return $coins / $coins_per_dollar;
    }

    public static function calculateCoins($cash)
    {

        $coins_per_dollar = \Config::get('cashout.coins_per_dollar');

        //$1 = 100 Coins
        return $cash * $coins_per_dollar;
    }

    public function sendReferralCoins($user_id, $coins, $trial_pay_response_id)
    {
        // Get all referred users

        $this->getUpChain($user_id);

        //Get 5% from total
        $calculated_coins = ($coins / 100) * 5;

        $need_amt = sizeof($this->chain) * $calculated_coins;

        try {
            $referral = User::findOrFail($user_id);
            $referral->coins = $referral->coins + ($coins - $need_amt);
            $referral->save();
        } catch (ModelNotFoundException $e) {
            return;
        }

        foreach ($this->chain as $u_id) {

            try {

                $u = User::findOrFail($u_id);
                $u->coins = $u->coins + $calculated_coins;
                $u->save();

                $user_referral_coins = new UserReferralCoins();
                $user_referral_coins->referral_id = $user_id;
                $user_referral_coins->user_id = $u_id;
                $user_referral_coins->coins_earned = $calculated_coins;
                $user_referral_coins->trial_pay_response_id = $trial_pay_response_id;
                $user_referral_coins->save();

            } catch (ModelNotFoundException $e) {
                //Dont throw exception here . It comes from trialpay callback url
                continue;
            }
        }
    }

} 