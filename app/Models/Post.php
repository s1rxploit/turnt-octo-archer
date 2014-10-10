<?php namespace App\Models;
/**
 * http://stackoverflow.com/questions/22868362/laravel-4-1-eager-loading-nested-relationships-with-constraints
 */
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @var string
     */
    protected $table = "posts";

    /**
     * @var bool
     */
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function comments()
    {
        return $this->hasMany('Comment');
    }

    /**
     * @return bool|null
     */
    public function delete()
    {
        // Delete the comments
        $this->comments()->delete();

        // Delete the post
        return parent::delete();
    }

    /**
     * @return string
     */
    public function content()
    {
        return nl2br($this->body);
    }
}