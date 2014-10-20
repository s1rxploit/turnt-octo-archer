<?php

use KodeInfo\UserManagement\UserManagement;
use Cashout\Helpers\Utils;

class AuthController extends BaseController
{

    public $userManager;

    function __construct(UserManagement $userManager)
    {
        $this->userManager = $userManager;
    }

    public function getCustomerRegister()
    {
        return View::make('customer.register');
    }

    public function postCustomerRegister()
    {

        $name = Input::get('name');
        $email = Input::get('email');
        $password = Input::get('password');
        $password_confirmation = Input::get('password_confirmation');

        try {

            $this->userManager->createUser(["name" => $name,
                    "email" => $email,
                    "password" => $password,
                    "password_confirmation" => $password_confirmation,
                    "referral_code" => Utils::generateReferralCode()],
                'customer',
                false);

            Session::flash('success_msg', "Registration Successful . Please activate your account by clicking activation link we sent to your email - " . $email);
            return Redirect::back();

        } catch (\KodeInfo\UserManagement\Exceptions\AuthException $e) {
            Session::flash('error_msg', Utils::buildMessages($e->getErrors()));
            return Redirect::back();
        }
    }

    public function getCustomerForgotPassword()
    {
        return View::make("customer.forgot_password");
    }

    public function postCustomerForgotPassword()
    {
        $email = Input::get("email");

        $user = \Cashout\Models\User::where('email', $email)->first();

        if (sizeof($user) <= 0) {
            Session::flash("error_msg", "Account not found . Please enter valid email");
            return Redirect::back();
        } else {
            $reset_code = $this->userManager->generateResetCode();
            $user->reset_password_code = $reset_code;
            $user->reset_requested_on = \Carbon\Carbon::now();
            $user->save();

            //TODO Create email template and sent

            Session::flash('success_msg','Please click on the link we sent to your email to reset password');
            return Redirect::to('/customer/forgot-password');
        }

    }

    public function getCustomerReset($email,$code){

        if(strlen($email)<=0 || strlen($code)<=0){
            Session::flash("error_msg","Invalid Request . Please reset your password");
            return Redirect::to('/customer/forgot-password');
        }

        //Check code and email
        $user = \Cashout\Models\User::where('email',$email)->where('reset_password_code',$code)->first();

        if(sizeof($user)<=0){
            Session::flash("error_msg","Invalid Request . Please reset your password");
            return Redirect::to('/customer/forgot-password');
        }else{
            //check for 24 hrs for token
            $reset_requested_on = \Carbon\Carbon::createFromFormat('Y-m-d G:i:s',$user->reset_requested_on);
            $present_day = \Carbon\Carbon::now();

            if($reset_requested_on->addDay()>$present_day){
                //Show new password view
                return View::make('customer.reset_password',['email'=>$email,'code'=>$code]);
            }else{
                Session::flash("error_msg","Password change token expired . Please reset your password");
                return Redirect::to('/customer/forgot-password');
            }
        }
    }

    public function postCustomerResetNewPassword(){

        $password = Input::get('password','');
        $password_confirmation = Input::get('password_confirmation','');

        if($password==$password_confirmation){

            $validate_reset = \Cashout\Models\User::where('email',Input::get('email',''))->where('reset_password_code',Input::get('code',''))->first();

            if(sizeof($validate_reset)>0){
                $user = \Cashout\Models\User::where('email',Input::get('email'))->first();
                $user->password = Hash::make($password);
                $user->save();

                Session::flash('success_msg', 'Password changed successfully');
                return Redirect::to('/customer/login');
            }else{
                Session::flash('error_msg', 'Invalid password entered');
                return Redirect::back();
            }
        }else{
            Session::flash('error_msg', 'New Password and Confirm Password should be same');
            return Redirect::back();
        }
    }

    public function getCustomerLogin()
    {

        if (Auth::check()) {

            $userManager = new KodeInfo\UserManagement\UserManagement(Auth::user()->id);

            if ($userManager->user->isCustomer()) {
                return Redirect::to('/customer');
            }

        }

        return View::make('customer.login');
    }

    public function getAdminLogin()
    {
        return View::make('admin.login');
    }

    public function logout()
    {
        $this->userManager->logout();
        return Redirect::to('/');
    }

    public function signInWithFacebook()
    {

        $fb = OAuth::consumer('Facebook');

        if (Input::has('code')) {

            $fb->requestAccessToken(Input::get('code'));

            $result = json_decode($fb->request('/me'), true);

            if (isset($result['email'])) {
                //Is he registered user
                $user = DB::table('users')->where('email', $result['email'])->first();

                if (sizeof($user) > 0) {
                    //is registered so do login
                    try {

                        $this->userManager->loginWithID($result['email'], true);

                        return Redirect::to('/customer');

                    } catch (\KodeInfo\UserManagement\Exceptions\LoginFieldsMissingException $e) {
                        Session::flash('error_msg', Utils::buildMessages($e->getErrors()));
                        return Redirect::back();
                    } catch (\KodeInfo\UserManagement\Exceptions\UserNotFoundException $e) {
                        Session::flash('error_msg', Utils::buildMessages($e->getErrors()));
                        return Redirect::back();
                    } catch (\KodeInfo\UserManagement\Exceptions\UserNotActivatedException $e) {
                        Session::flash('error_msg', Utils::buildMessages($e->getErrors()));
                        return Redirect::back();
                    } catch (\KodeInfo\UserManagement\Exceptions\UserBannedException $e) {
                        Session::flash('error_msg', Utils::buildMessages($e->getErrors()));
                        return Redirect::back();
                    } catch (\KodeInfo\UserManagement\Exceptions\UserSuspendedException $e) {
                        Session::flash('error_msg', Utils::buildMessages($e->getErrors()));
                        return Redirect::back();
                    }
                } else {

                    $password = "311311";//str_random(8);

                    //not registered so register
                    try {

                        $this->userManager->createUser(["name" => $result['name'],
                                "username" => '',
                                "email" => $result['email'],
                                "password" => $password,
                                "password_confirmation" => $password,
                                "referral_code" => Utils::generateReferralCode()],
                            'customer',
                            true);

                        $this->userManager->login(["email" => $result['email'],
                            "password" => $password], true, true);

                        return Redirect::to('/customer');

                    } catch (\KodeInfo\UserManagement\Exceptions\LoginFieldsMissingException $e) {
                        Session::flash('error_msg', Utils::buildMessages($e->getErrors()));
                        return Redirect::back();
                    } catch (\KodeInfo\UserManagement\Exceptions\GroupNotFoundException $e) {
                        Session::flash('error_msg', Utils::buildMessages($e->getErrors()));
                        return Redirect::back();
                    } catch (\KodeInfo\UserManagement\Exceptions\UserAlreadyExistsException $e) {
                        Session::flash('error_msg', Utils::buildMessages($e->getErrors()));
                        return Redirect::back();
                    } catch (\KodeInfo\UserManagement\Exceptions\AuthException $e) {
                        Session::flash('error_msg', Utils::buildMessages($e->getErrors()));
                        return Redirect::back();
                    }
                }
            }

            Session::flash('error_msg', 'User not found . Please register to continue');
            return Redirect::to('/customer/register');

        } else {
            $url = $fb->getAuthorizationUri();
            return Redirect::away((string)$url);
        }
    }

    public function postLogin()
    {
        try {
            $this->userManager->login(["email" => Input::get('email'),
                "password" => Input::get('password')], Input::has('remember_me'), true);

            return Redirect::to('/customer');

        } catch (\KodeInfo\UserManagement\Exceptions\AuthException $e) {
            Session::flash('error_msg', Utils::buildMessages($e->getErrors()));
            return Redirect::back();
        }
    }

    public function forgot_password()
    {

    }

    public function reset_password()
    {

    }
} 