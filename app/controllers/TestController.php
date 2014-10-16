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

    public $userManager;

    function __construct(UserManagement $userManager)
    {
        $this->userManager = $userManager;
    }

    public function isLoggedIn(){
        dd(Auth::check());
    }

    public function logout(){
        $this->userManager->logout();
        return Response::json( [ 'result'=>1,'data'=>[] ] );
    }

    public function login()
    {
        try {

            $user = $this->userManager->login(["email" => Input::get('email'),
                    "password" => Input::get('password')],
                false,
                true);

            return Response::json(['result' => 1, 'data' => ['user' => $user]]);

        } catch (\KodeInfo\UserManagement\Exceptions\LoginFieldsMissingException $e) {
            dd($e);
        } catch (\KodeInfo\UserManagement\Exceptions\UserNotFoundException $e) {
            dd($e);
        } catch (\KodeInfo\UserManagement\Exceptions\UserNotActivatedException $e) {
            dd($e);
        } catch (\KodeInfo\UserManagement\Exceptions\UserBannedException $e) {
            dd($e);
        } catch (\KodeInfo\UserManagement\Exceptions\UserSuspendedException $e) {
            dd($e);
        }
    }

    public function register()
    {

        try {
            $user = $this->userManager->createUser(["name" => Input::get('name'),
                    "username" => Input::get('username'),
                    "email" => Input::get('email'),
                    "password" => Input::get('password'),
                    "password_confirmation" => Input::get('password_confirmation')],
                null,
                true);

            return Response::json(['result' => 1, 'data' => ['user' => $user]]);


        } catch (\KodeInfo\UserManagement\Exceptions\LoginFieldsMissingException $e) {
            dd($e);
        } catch (\KodeInfo\UserManagement\Exceptions\GroupNotFoundException $e) {
            dd($e);
        } catch (\KodeInfo\UserManagement\Exceptions\UserAlreadyExistsException $e) {
            dd($e);
        } catch (\KodeInfo\UserManagement\Exceptions\AuthException $e) {
            dd($e);
        }
    }

    public function forgot_password(){

    }

    public function reset_password(){

    }

    public function login_with_fb(){

    }

    /**
     * @Get("check")
     */
   public function annotations(){
        return "Route Annotations";
   }

    /**
    * @Post("trialpay/process")
    */
    public function trial_pay(){

        $message_signature = $_SERVER['TrialPay-HMAC-MD5'];

        // Recalculate the signature locally
        $key = ',#GggcD5f%B5@-A';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // the following is for POST notification
            if (empty($HTTP_RAW_POST_DATA)) {
                $recalculated_message_signature = hash_hmac('md5', file_get_contents('php://input'), $key);
            } else {
                $recalculated_message_signature = hash_hmac('md5', $HTTP_RAW_POST_DATA, $key);
            }

        } else {
            // the following is for GET notification
            $recalculated_message_signature = hash_hmac('md5', $_SERVER['QUERY_STRING'], $key);

        }

        if ($message_signature == $recalculated_message_signature) {

            $sid = Input::get('sid');



            \Log::error(Input::all());
        } else {
            \Log::error('Message not Authentic');
        }
        //check if user with that sid exists


        return 1;
    }

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
