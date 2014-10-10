<?php namespace App\Http\Controllers;

use App\Http\Requests\UserFollowsNationRequest;
use App\Models\Nationality;
use App\Repositories\NationalityRepository;
use App\User;
use Illuminate\Routing\Controller;
use Auth;
use Response;

class UsersController extends Controller {

    public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => ['post']]);
    }

    /**
     * @param NationalityRepository $repo
     * @return mixed
     */
    public function getNationsFollowed(NationalityRepository $repo)
    {
        $response = $repo->getNationsFollowed(Auth::user()->id);

        return Response::json(['result' => 1, 'data' => $response]);
    }

    /**
     * @param UserFollowsNationRequest $request
     * @param NationalityRepository $repo
     * @return mixed
     */
    public function followNation(UserFollowsNationRequest $request, NationalityRepository $repo)
    {
        $user = User::find(Auth::user()->id);

        $nation = Nationality::find($request->id);

        $repo->followNation($user,$nation);

        return Response::json(['result' => 1, 'data' => 'Success']);
    }


}
