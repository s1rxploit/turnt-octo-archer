<?php namespace Cashout\Models;

class Comment extends \Eloquent
{
    /**
     * @var string
     */
    protected $table = "comment";
    /**
     * @var bool
     */
    public $timestamps = true;

    public function post()
    {
        return $this->belongsTo('Post');
    }

    /**
     * @return string
     */
    public function content()
    {
        return nl2br($this->body);
    }
}