<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 22-10-2014
 * Time: 12:56
 */

namespace Cashout\Helpers;

use Cashout\Models\UserReferral;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class CGS {

    public $chain = [];
    public $cgs_string = "";
    public $depth = 0;
    public $chain_depth = 0;


    public function getCGS($user_id){

        $users = UserReferral::where('referral_id', $user_id)->where('user_id','>',0)->lists('user_id');

        $this->chain[$user_id] = $users;

        //[1]=>[2 ,3]
        $this->recursiveCGS($users,$this->chain[$user_id]);

        return ['cgs_array'=>$this->chain,'cgs_string'=>$this->cgs_string];
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

            $this->cgs_string.="<ul>";

            // [1]=>[2,3] $arr is at [1]
            for($i=0;$i<sizeof($user_ids);$i++) {

                //index 2
                $users = UserReferral::where('referral_id', $user_ids[$i])->where('user_id', '>', 0)->lists('user_id');

                //index 2 users 4,5
                //by reference on 2 nd array
                $find_user = DB::table('users')->where('id',$arr[$i])->first();
                $this->cgs_string.="<li title='Today Coins Earned : 200 \n Yesterday Coins Earned : 10'><label>$find_user->name</label>";

                unset($arr[$i]);

                $arr[$user_ids[$i]] = $users;

                if(sizeof($users)>0) {
                    //[2]=>[4,5] reference [2]=>
                    $this->recursiveCGS($users, $arr[$user_ids[$i]]);
                }

                $this->cgs_string.="</li>";

            }

            $this->cgs_string.="</ul>";

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


} 