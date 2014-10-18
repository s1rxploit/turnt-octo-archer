<?php

use \Cashout\Models\Notifications;

class HomeController extends BaseController {

    public function customerIndex(){

        $this->data['notifications'] = Notifications::getActiveNotifications();
        $this->data['archived_notifications'] = Notifications::getArchivedNotifications();

        return View::make('customer.index',$this->data);
    }

	public function adminIndex()
	{
		return View::make('admin.index');
	}

    public function archiveNotification($id){

        $result = Notifications::archiveNotifications($id);

        if($result){
            Session::flash('success_msg','Notification archived successfully');
            return Redirect::back();
        }else{
            Session::flash('error_msg','Unable to archive notification');
            return Redirect::back();
        }

    }

}
