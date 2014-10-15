<?php namespace Cashout\Models;

class Post extends \Eloquent
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