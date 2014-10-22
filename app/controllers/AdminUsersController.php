<?php

use \Cashout\Models\Notifications;
use \Cashout\Models\News;

class AdminUsersController extends BaseController
{

    public function createAdmin()
    {
        return View::make('backend.users.create_admin');
    }

    public function viewUserProfile($user_id)
    {

        try {
            $user = \Cashout\Models\User::findOrFail($user_id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Session::flash('error_msg', 'User not found');
            return Redirect::back();
        }

        $this->data['profile'] = $user;
        return View::make('backend.users.view_user',$this->data);
    }

    public function updateUser($user_id){

        $name = Input::get('name');
        $birthday = Input::get('birthday');
        $bio = Input::get('bio', '');
        $gender = Input::get('gender');
        $mobile_no = Input::get('mobile_no');
        $country = Input::get('country');
        $old_avatar = Input::get('old_avatar');
        $password = Input::get('password');
        $password_confirmation = Input::get('password_confirmation');

        try {

            $profile = \Cashout\Models\User::findOrFail($user_id);

            $profile->name = $name;
            $profile->birthday = $birthday;
            $profile->bio = $bio;
            $profile->gender = $gender;
            $profile->mobile_no = $mobile_no;
            $profile->country = $country;
            $profile->avatar = Input::hasFile('avatar') ? \Cashout\Helpers\Utils::imageUpload(Input::file('avatar'), 'profile') : $old_avatar;

            if(strlen($password)>0&&strlen($password_confirmation)>0&&$password==$password_confirmation){
                $profile->password = Hash::make($password);
            }

            $profile->save();

            Session::flash('success_msg', 'Profile updated successfully');
            return Redirect::back();

        } catch (\Exception $e) {
            Session::flash('error_msg', 'Unable to update profile');
            return Redirect::back()->withInput(Input::all(Input::except(['_token','avatar'])));
        }
    }

    public function allUsers()
    {

        $this->data["users"] = DB::table('users')->paginate(10);

        return View::make('backend.users.all_users', $this->data);
    }

    public function storeAdmin()
    {

        $userManager = new \KodeInfo\UserManagement\UserManagement();

        try {
            $user = $userManager->createUser(Input::all(), 'admin', true);

            if(Input::hasFile('avatar')){
                $user->avatar = \Cashout\Helpers\Utils::imageUpload(Input::file('avatar'), 'profile');
                $user->save();
            }

            Session::flash('success_msg', 'Admin created successfully');

            return Redirect::back();

        } catch (\KodeInfo\UserManagement\Exceptions\AuthException $e) {
            Session::flash('error_msg', \Cashout\Helpers\Utils::buildMessages($e->getErrors()));
            return Redirect::back();
        }
    }

    public function getNewsUpdate($news_id)
    {

        try {
            $news = News::findOrFail($news_id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Session::flash('error_msg', 'Unable to find News item to update');
            return Redirect::back();
        }

        $this->data['news'] = $news;

        return View::make('backend.news.update_news', $this->data);
    }

    public function postNewsUpdate($news_id)
    {

        if (sizeof(DB::table('news')->where('slug', Str::slug(Input::get('title')))->where('id', '!=', $news_id)->get()) > 0) {
            Session::flash('error_msg', 'News with same title already exists');
            return Redirect::back();
        }

        try {
            $news = News::findOrFail($news_id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Session::flash('error_msg', 'Unable to find News item to update');
            return Redirect::back();
        }

        $news->title = Input::get('title');
        $news->slug = Str::slug(Input::get('title'));
        $news->description = Input::get('description');
        $news->status = Input::get('status');
        $news->save();

        Session::flash('success_msg', 'News updated successfully');
        return Redirect::to('/admin/news/all');
    }

    public function deleteUsers($user_id)
    {

        try {
            \Cashout\Models\User::findOrFail($user_id)->delete();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Session::flash('error_msg', 'Unable to find User');
            return Redirect::back();
        }

        Session::flash('success_msg', 'User deleted successfully');
        return Redirect::back();
    }

} 