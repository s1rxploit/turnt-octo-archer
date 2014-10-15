<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 16-10-2014
 * Time: 04:07
 */

use KodeInfo\UserManagement\UserManagement;

class AuthController {

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

} 