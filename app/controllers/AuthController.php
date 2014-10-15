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

    public function signInWithFacebook(){

        // get data from input
        $code = Input::get( 'code' );

        // get fb service
        $fb = OAuth::consumer('Facebook');

        // check if code is valid

        // if code is provided get user data and sign in
        if ( !empty($code) )
        {

            // This was a callback request from google, get the token
            $token = $fb->requestAccessToken( $code );

            // Send a request with it
            $result = json_decode( $fb->request( '/me' ), true );

            //$message = 'Your unique facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
            //echo $message. "<br/>";

            if(isset($result['email'])){
                //Is he registered user
                $user = DB::table('users')->where('email',$result['email'])->first();

                if(sizeof($user)>0){
                    //is registered so do login
                    try {

                        $user = $this->userManager->loginWithEmail($result['email'],true);

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
                }else{

                    $password = '311311';

                    //not registered so register
                    try {

                        $user = $this->userManager->createUser(["name" => $result['name'],
                                "username" => '',
                                "email" => $result['email'],
                                "password" => $password,
                                "password_confirmation" => $password],
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
            }
            //Var_dump
            //display whole array().
            dd($result);

        }
        // if not ask for permission first
        else
        {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            //dd((string)$url);

            // return to facebook login url
            return Redirect::away((string)$url);
        }
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