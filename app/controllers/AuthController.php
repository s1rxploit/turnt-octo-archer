<?php

use KodeInfo\UserManagement\UserManagement;

class AuthController extends BaseController {

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

    public function postLogin()
    {
        try {

            $user = $this->userManager->login(["email" => Input::get('email'),
                    "password" => Input::get('password')],
                false,
                true);

            return Response::json(['result' => 1, 'data' => ['user' => $user]]);

        } catch (\KodeInfo\UserManagement\Exceptions\LoginFieldsMissingException $e) {
            return Response::json(['result' => 0, 'data' => $e->getErrors()]);
        } catch (\KodeInfo\UserManagement\Exceptions\UserNotFoundException $e) {
            return Response::json(['result' => 0, 'data' => $e->getErrors()]);
        } catch (\KodeInfo\UserManagement\Exceptions\UserNotActivatedException $e) {
            return Response::json(['result' => 0, 'data' => $e->getErrors()]);
        } catch (\KodeInfo\UserManagement\Exceptions\UserBannedException $e) {
            return Response::json(['result' => 0, 'data' => $e->getErrors()]);
        } catch (\KodeInfo\UserManagement\Exceptions\UserSuspendedException $e) {
            return Response::json(['result' => 0, 'data' => $e->getErrors()]);
        }
    }

    public function postRegister()
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
            return Response::json(['result' => 0, 'data' => $e->getErrors()]);
        } catch (\KodeInfo\UserManagement\Exceptions\GroupNotFoundException $e) {
            return Response::json(['result' => 0, 'data' => $e->getErrors()]);
        } catch (\KodeInfo\UserManagement\Exceptions\UserAlreadyExistsException $e) {
            return Response::json(['result' => 0, 'data' => $e->getErrors()]);
        } catch (\KodeInfo\UserManagement\Exceptions\AuthException $e) {
            return Response::json(['result' => 0, 'data' => $e->getErrors()]);
        }
    }

    public function forgot_password(){

    }

    public function reset_password(){

    }

    public function login_with_fb(){

    }

} 