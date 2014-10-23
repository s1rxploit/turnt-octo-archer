<?php

use \Cashout\Models\Notifications;
use \Cashout\Models\News;

class DashboardController extends BaseController {

    public function index()
    {

        $this->data['notifications'] = Notifications::getActiveNotifications();
        $this->data['archived_notifications'] = Notifications::getArchivedNotifications();
        $this->data['news'] = News::orderBy('created_at','DESC')->get();

        if(Auth::user()->isAdmin()){

            $past_hr = \Carbon\Carbon::now()->subHour();
            $today = \Carbon\Carbon::now()->subDay();
            $this_week = \Carbon\Carbon::now()->subWeek();
            $this_month = \Carbon\Carbon::now()->subMonth();

            $this->data['users_past_hr'] = DB::table('users')->where('created_at','>',$past_hr)->count();
            $this->data['users_today'] = DB::table('users')->where('created_at','>',$today)->count();
            $this->data['users_this_week'] = DB::table('users')->where('created_at','>',$this_week)->count();
            $this->data['users_this_month'] = DB::table('users')->where('created_at','>',$this_month)->count();
            $this->data['users_total'] = sizeof(DB::table('users')->get());
        }

        return View::make('backend.index', $this->data);
    }

    public function startEarnings(){
        return View::make('backend.start_earnings');
    }

    public function showCGS(){

        $cgs = new \Cashout\Helpers\CGS();

        $response = $cgs->getCGS(Auth::user()->id);

        return View::make('backend.referral_tree',['tree'=>$response['cgs_string']]);

    }

    public function editProfile()
    {

        $this->data['profile'] = Auth::user();

        return View::make('backend.edit_profile', $this->data);
    }

    public function updateProfile()
    {

        $name = Input::get('name');
        //$username = Input::get('username');
        $birthday = Input::get('birthday');
        $bio = Input::get('bio', '');
        $gender = Input::get('gender');
        $mobile_no = Input::get('mobile_no');
        $country = Input::get('country');
        $old_avatar = Input::get('old_avatar');


        /*if(\Cashout\Models\User::where('username',$username)->where('id','!=',Auth::user()->id)->count()>0){
            Session::flash('error_msg', 'Username is already taken by other user . Please enter a new username');
            return Redirect::back()->withInput(Input::all(Input::except(['_token'])));
        }*/

        try {

            $profile = \Cashout\Models\User::findOrFail(Auth::user()->id);

            $profile->name = $name;
            // $profile->username = $username;
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
            return Redirect::back()->withInput(Input::all(Input::except(['_token','avatar'])));
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