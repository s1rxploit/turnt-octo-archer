<?php

use Illuminate\Routing\Controller;
use Cashout\Helpers\Utils;
use Cashout\Models\UserReferral;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use KodeInfo\UserManagement\UserManagement;

class TestController extends Controller
{

    public $chain = [];
    public $cgs_string = "";
    public $depth = 0;
    public $chain_depth = 0;

    public $userManager;

    function __construct(UserManagement $userManager)
    {
        $this->userManager = $userManager;
    }


    public function referUser($referral_id, $user_id)
    {

        $referral = UserReferral::where('user_id', $user_id)->where('referral_id', $referral_id)->get();

        if (sizeof($referral)>0) {
            return "Already referred this user";
        } else {

            $user_referral = new UserReferral();
            $user_referral->referral_id = $referral_id;
            $user_referral->user_id = $user_id;
            $user_referral->save();

            return "Successfully referred new user";
        }

    }

    public function getUpChain($user_id)
    {

        //Find if any one referred this user if yes always will be only 1
        $user = UserReferral::where('user_id', $user_id)->first();

        if (!empty($user)) {

            array_push($this->chain, $user->user_id);

            //User have a referral .
            if($user->referral_id > 0)
                $this->getUpChain($user->referral_id);

        } else {

            //this was first user who started referral system
            array_push($this->chain, $user_id);

            array_splice($this->chain,0,1);

            return dd($this->chain);
        }
    }

    public function getCGS($user_id){

        $users = UserReferral::where('referral_id', $user_id)->where('user_id','>',0)->lists('user_id');

        $this->chain[$user_id] = $users;

        //[1]=>[2 ,3]
        $this->recursiveCGS($users,$this->chain[$user_id]);

        Log::error($this->chain);
        dd($this->cgs_string($this->chain));

        dd($this->chain_depth($this->chain));

    }

    public function cgs_string($arr){

        foreach($arr as $item){
            $keys = array_keys($item);

            $temp_string = "<ul>";

            foreach($keys as $key){
                $temp_string.="<li><label>$key</label>";
                $this->cgs_string($item[$key]);
                $temp_string.="</li>";
            }

            $temp_string.="<ul>";

            $this->cgs_string.=$temp_string;
        }

        return $this->cgs_string;

    }

    public function chain_depth($arr, $n = 0){

        $max = $n;

        foreach ($arr as $item) {
            if (is_array($item)) {
                $max = max($max, $this->chain_depth($item, $n + 1));
            }
        }

        return $max;
    }

    public function recursiveCGS($user_ids,&$arr){

        if($this->chain_depth($this->chain) <= 8 ){

            // [1]=>[2,3] $arr is at [1]
            for($i=0;$i<sizeof($user_ids);$i++) {

                //index 2
                $users = UserReferral::where('referral_id', $user_ids[$i])->where('user_id', '>', 0)->lists('user_id');

                //index 2 users 4,5
                //by reference on 2 nd array
                unset($arr[$i]);

                $arr[$user_ids[$i]] = $users;

                if(sizeof($users)>0) {
                    //[2]=>[4,5] reference [2]=>
                    $this->recursiveCGS($users, $arr[$user_ids[$i]]);
                }

            }

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

    // 2 , 3

    public function getDownChain($user_id)
    {
        //$user_id can be array when recursively

        //Find if any one referred this user can be array of users
        if (!is_array($user_id)) {
            $user_ids[] = $user_id;
        } else {
            $user_ids = $user_id[0];
        }

        foreach ($user_ids as $u_id) {
            $users[] = UserReferral::where('referral_id', $u_id)->get();
        }

        if (!empty($users)) {

            $u = [];

            foreach ($users as $user) {

                $u2 = [];

                foreach ($user as $uu) {
                    $u2 = UserReferral::where('referral_id', $uu->referral_id)->lists('user_id');
                }


                if(sizeof($u2)>0) {

                    foreach($u2 as $u3){
                        array_push($this->chain, $u3);
                    }

                    array_push($u, $u2);
                }

            }


            if(sizeof($u)>0){
                $this->getDownChain($u);
            }

        } else {

            //this was first user who started referral system
            array_push($this->chain, $user_id);

            dd($this->chain);
        }

        dd($this->chain);
    }

}
