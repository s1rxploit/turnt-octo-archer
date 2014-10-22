<?php

use \Cashout\Models\Notifications;
use \Cashout\Models\News;

class AdminNewsController extends BaseController {

    public function createNews(){
        return View::make('backend.news.create_news');
    }

    public function allNews(){

        $this->data["news"] = DB::table('news')->paginate(10);

        return View::make('backend.news.all_news',$this->data);
    }

    public function storeNews(){

        $title = Input::get('title');
        $description = Input::get('description');
        $status = Input::get('status',0);

        if(strlen($title)<=0||strlen($description)<=0){
            Session::flash('error_msg','All fields are required . Please check your fields');
            return Redirect::back()->withInput(Input::all());
        }

        $news = new News();
        $news->title=$title;
        $news->slug=Str::slug($title);
        $news->description=$description;
        $news->status=$status;
        $news->save();

        Session::flash('success_msg','News published successfully');
        return Redirect::back();
    }

    public function getNewsUpdate($news_id){

        try{
            $news = News::findOrFail($news_id);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            Session::flash('error_msg','Unable to find News item to update');
            return Redirect::back();
        }

        $this->data['news'] = $news;

        return View::make('backend.news.update_news',$this->data);
    }

    public function postNewsUpdate($news_id){

        if(sizeof(DB::table('news')->where('slug',Str::slug(Input::get('title')))->where('id','!=',$news_id)->get())>0){
            Session::flash('error_msg','News with same title already exists');
            return Redirect::back();
        }

        try{
            $news = News::findOrFail($news_id);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            Session::flash('error_msg','Unable to find News item to update');
            return Redirect::back();
        }

        $news->title = Input::get('title');
        $news->slug = Str::slug(Input::get('title'));
        $news->description = Input::get('description');
        $news->status = Input::get('status');
        $news->save();

        Session::flash('success_msg','News updated successfully');
        return Redirect::to('/admin/news/all');
    }

    public function deleteNews($news_id){

        try{
            News::findOrFail($news_id)->delete();
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            Session::flash('error_msg','Unable to find News item to delete');
            return Redirect::back();
        }

        Session::flash('success_msg','News deleted successfully');
        return Redirect::back();
    }

} 