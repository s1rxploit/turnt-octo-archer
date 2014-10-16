<?php namespace Cashout\Models;

use Auth;
use DB;

class Notifications extends \Eloquent
{
    protected $table = "notifications";

    const NOTIFICATIONS_ACTIVE = 1;
    const NOTIFICATIONS_ARCHIVED = 2;

    public static function getActiveNotifications(){

        $user_id = Auth::getUser()->getId();

        return DB::table('notifications')
            ->where('user_id',$user_id)
            ->where('status',self::NOTIFICATIONS_ACTIVE)
            ->orderBy('created_at','DESC')
            ->get();
    }

    public static function getAllNotifications(){

        $user_id = Auth::getUser()->getId();

        return DB::table('notifications')
            ->where('user_id',$user_id)
            ->orderBy('created_at','DESC')
            ->get();
    }

    public static function getArchivedNotifications(){

        $user_id = Auth::getUser()->getId();

        return DB::table('notifications')
            ->where('user_id',$user_id)
            ->where('status',self::NOTIFICATIONS_ARCHIVED)
            ->orderBy('created_at','DESC')
            ->get();
    }

}