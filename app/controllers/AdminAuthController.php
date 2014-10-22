<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 22-10-2014
 * Time: 03:08
 */

use KodeInfo\UserManagement\UserManagement;
use Cashout\Helpers\Utils;

class AdminAuthController {

    public $userManager;

    function __construct(UserManagement $userManager)
    {
        $this->userManager = $userManager;
    }

    public function getChangePassword(){
        return View::make('customer.change_password');
    }

    public function postChangePassword(){

        $current_password = Input::get('current_password','');
        $password = Input::get('password','');
        $password_confirmation = Input::get('password_confirmation','');

        if($password==$password_confirmation){
            if(Auth::validate(['email'=>Auth::user()->email,'password'=>$current_password])){
                $user = \Cashout\Models\User::find(Auth::user()->id);
                $user->password = Hash::make($password);
                $user->save();

                Session::flash('success_msg', 'Password changed successfully');
                return Redirect::back();

            }else{
                Session::flash('error_msg', 'Invalid password entered');
                return Redirect::back();
            }
        }else{
            Session::flash('error_msg', 'New Password and Confirm Password should be same');
            return Redirect::back();
        }
    }

    public function getRegister()
    {
        return View::make('admin.register');
    }

    public function postRegister()
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
                'admin',
                false);

            Session::flash('success_msg', "Registration Successful . Please activate your account by clicking activation link we sent to your email - " . $email);
            return Redirect::back();

        } catch (\KodeInfo\UserManagement\Exceptions\AuthException $e) {
            Session::flash('error_msg', Utils::buildMessages($e->getErrors()));
            return Redirect::back();
        }
    }

    public function getLogin()
    {

        if (Auth::check()) {

            $userManager = new KodeInfo\UserManagement\UserManagement(Auth::user()->id);

            if ($userManager->user->isAdmin()) {
                return Redirect::to('/admin');
            }

        }

        return View::make('admin.login');
    }

    public function logout()
    {
        $this->userManager->logout();
        return Redirect::to('/admin/login');
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

                        return Redirect::to('/admin');

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
                            'admin',
                            true);

                        $this->userManager->login(["email" => $result['email'],
                            "password" => $password], true, true);

                        return Redirect::to('/admin');

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
            return Redirect::to('/admin/register');

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

            return Redirect::to('/admin');

        } catch (\KodeInfo\UserManagement\Exceptions\AuthException $e) {
            Session::flash('error_msg', Utils::buildMessages($e->getErrors()));
            return Redirect::back();
        }
    }
} 