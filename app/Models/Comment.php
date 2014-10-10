<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App\Models
 */
class Comment extends Model
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