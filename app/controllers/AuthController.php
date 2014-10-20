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

            $fb->requestAccessToken( Input::get('code') );

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

                    $password = str_random(8);

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
    }

    public function postRegister()
    {

        try {
            $user = $this->userManager->createUser(["name" => Input::get('name'),
                    "username" => Input::get('username'),
                    "email" => Input::get('email'),
                    "password" => Input::get('password'),
                    "password_confirmation" => Input::get('password_confirmation'),
                    "referral_code" => Utils::generateReferralCode()],
                null,
                true);

            return Response::json(['result' => 1, 'data' => ['user' => $user]]);


        } catch (\KodeInfo\UserManagement\Exceptions\LoginFieldsMissingException $e) {
            return Response::json(['result' => 0, 'data' => $e->getErrors()]);
        } catch (\KodeInfo\UserManagement\Exceptions\GroupNotFoundException $e) {
            return Response::json(['result' => 0, 'data' => $e->getErrors()]);
        } catch (\KodeInfo\UserManagement\Exceptions\UserAlreadyExistsException $e) {
            return Response::json(['result' => 0, 'data' => $e->getErrors()]);
        } catch (\KodeInfo\UserManagement\Exceptions\AuthException $e) {
            return Response::json(['result' => 0, 'data' => $e->getErrors()]);
        }
    }

    public function forgot_password()
    {

    }

    public function reset_password()
    {

    }
} 