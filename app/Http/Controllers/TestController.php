<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Helpers\Utils;
use App\Models\UserReferral;
use DB;
use Hash;

class TestController extends Controller
{

    public $chain = [];

    public function createUser($name, $username, $email, $password)
    {
        DB::table('users')->insert([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($password),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        return "Handsome User Created";
    }

    public function referUser($referral_id, $user_id)
    {

        $count = UserReferral::where('user_id', $user_id)->where('referral_id', $referral_id)->count();

        if ($count > 0) {
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

            //Find referral
            if (DB::table('users')->where('id', $user->user_id)->count() > 0) {
                //user exists add to array
                array_push($this->chain, $user->user_id);
            }


            //dd($user->referral_id);

            //User have a referral .
            if (DB::table('users')->where('id', $user->referral_id)->count() > 0) {
                $this->getUpChain($user->referral_id);
            }

        } else {

            //this was first user who started referral system
            array_push($this->chain, $user_id);

            return dd($this->chain);
        }
    }

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