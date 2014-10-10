<?php namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\Auth\Authenticator;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

/**
 * @Middleware("csrf")
 * @Middleware("guest", except={"logout"})
 */
class AuthController {

    /**
     * The authenticator implementation.
     *
     * @var Authenticator
     */
    protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @param  Authenticator $auth
     * @return void
     */
    public function __construct(Authenticator $auth)
    {
        $this->auth = $auth;
        $this->beforeFilter('csrf', ['on' => ['post']]);
        $this->beforeFilter('guest', ['except' => ['getLogout']]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  RegisterRequest $request
     * @return Response
     */
    public function postRegister(RegisterRequest $request)
    {
        // Registration form is valid, create user...
        $user = new User;
        $user->name = $request->name;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $this->auth->login($user, $request->input('remember',false) );

        return Response::json(['result' => 1, 'data' => ['user' => $user]]);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  LoginRequest $request
     * @return Response
     */
    public function postLogin(LoginRequest $request)
    {
        if ($this->auth->attempt($request->only('email', 'password')))
        {
            return Response::json(['result' => 1, 'data' => ['user' => $this->auth->user()]]);
        }
        return Response::json(['result'=>0,'data'=> ['error' => 'Invalid username or password.'] ]);
    }

    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function getLogout()
    {
        $this->auth->logout();

        return Response::json( [ 'result'=>1,'data'=>[] ] );
    }

}
