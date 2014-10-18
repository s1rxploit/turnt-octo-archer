<?php namespace Cashout\Models;

use Auth;
use DB;

class Notifications extends \Eloquent
{
    protected $table = "notifications";

    const NOTIFICATIONS_ACTIVE = 1;
    const NOTIFICATIONS_ARCHIVED = 2;

    public static function archiveNotifications($id){
        try{

            $n = Notifications::findOrFail($id);

            $n->status = Notifications::NOTIFICATIONS_ARCHIVED;

            $n->save();

            return true;
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return false;
        }
    }

    public static function getActiveNotifications(){

        $user_id = Auth::user()->id;

        return DB::table('notifications')
            ->where('user_id',$user_id)
            ->where('status',self::NOTIFICATIONS_ACTIVE)
            ->orderBy('created_at','DESC')
            ->get();
    }

    public static function getAllNotifications(){

        $user_id = Auth::user()->id;

        return DB::table('notifications')
            ->where('user_id',$user_id)
            ->orderBy('created_at','DESC')
            ->get();
    }

    public static function getArchivedNotifications(){

        $user_id = Auth::user()->id;

        return DB::table('notifications')
            ->where('user_id',$user_id)
            ->where('status',self::NOTIFICATIONS_ARCHIVED)
            ->orderBy('created_at','DESC')
            ->get();
    }

}