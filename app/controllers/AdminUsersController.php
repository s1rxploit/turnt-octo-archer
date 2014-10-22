<?php

use \Cashout\Models\Notifications;
use \Cashout\Models\News;

class AdminUsersController extends BaseController
{

    public function createAdmin()
    {
        return View::make('backend.users.create_admin');
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
            $userManager->createUser(Input::all(), 'admin', true);

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