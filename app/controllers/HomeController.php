<?php

use \Cashout\Models\Notifications;

class HomeController extends BaseController
{

    public function index(){
        return "On INDEX";
    }

    public function customerIndex()
    {

        $this->data['notifications'] = Notifications::getActiveNotifications();
        $this->data['archived_notifications'] = Notifications::getArchivedNotifications();

        return View::make('customer.index', $this->data);
    }

    public function adminIndex()
    {
        return View::make('admin.index');
    }

    public function editCustomerProfile()
    {

        $this->data['profile'] = Auth::user();

        return View::make('customer.edit_profile', $this->data);
    }

    public function storeCustomerProfile()
    {

        $name = Input::get('name');
        $username = Input::get('username');
        $birthday = Input::get('birthday');
        $bio = Input::get('bio', '');
        $gender = Input::get('gender');
        $mobile_no = Input::get('mobile_no');
        $country = Input::get('country');
        $old_avatar = Input::get('old_avatar');


        if(\Cashout\Models\User::where('username',$username)->where('id','!=',Auth::user()->id)->count()>0){
            Session::flash('error_msg', 'Username is already taken by other user . Please enter a new username');
            return Redirect::back()->withInput(Input::all(Input::except(['_token'])));
        }

        try {

            $profile = \Cashout\Models\User::findOrFail(Auth::user()->id);

            $profile->name = $name;
            $profile->username = $username;
            $profile->birthday = $birthday;
            $profile->bio = $bio;
            $profile->gender = $gender;
            $profile->mobile_no = $mobile_no;
            $profile->country = $country;
            $profile->avatar = Input::hasFile('avatar') ? \Cashout\Helpers\Utils::imageUpload(Input::file('avatar'), 'profile') : $old_avatar;

            $profile->save();

            Session::flash('success_msg', 'Profile updated successfully');
            return Redirect::back();


        } catch (\Exception $e) {
            Session::flash('error_msg', 'Unable to update profile');
            return Redirect::back()->withInput(Input::all(Input::except(['_token'])));;
        }

    }

    public function archiveNotification($id)
    {

        $result = Notifications::archiveNotifications($id);

        if ($result) {
            Session::flash('success_msg', 'Notification archived successfully');
            return Redirect::back();
        } else {
            Session::flash('error_msg', 'Unable to archive notification');
            return Redirect::back();
        }

    }

}
