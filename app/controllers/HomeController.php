<?php

use \Cashout\Models\Notifications;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

    public function archiveNotification($id){
        try{

            $n = Notifications::findOrFail($id);

            $n->status = Notifications::NOTIFICATIONS_ARCHIVED;

            $n->save();

            return Response::json( [ 'result'=>0,'message'=>'Successfully archived notification' ] );
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return Response::json( [ 'result'=>0,'message'=>'Notification not found' ] );
        }
    }

    public function unArchiveNotification($id){
        try{

            $n = Notifications::findOrFail($id);

            $n->status = Notifications::NOTIFICATIONS_ACTIVE;

            $n->save();

            return Response::json( [ 'result'=>0,'message'=>'Successfully archived notification' ] );
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return Response::json( [ 'result'=>0,'message'=>'Notification not found' ] );
        }
    }

    public function createNotification($user_id,$message){
        $n = new Notifications();

        $n->user_id = $user_id;
        $n->message = $message;
        $n->type = 'OFFER_WALL';
        $n->status = Notifications::NOTIFICATIONS_ACTIVE;

        $n->save();

        return 1;
    }

    public function activeNotifications(){
        return Notifications::getActiveNotifications();
    }

    public function allNotifications(){
        return Notifications::getAllNotifications();
    }

    public function archivedNotifications(){
        return Notifications::getArchivedNotifications();
    }

}
