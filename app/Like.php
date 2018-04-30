<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'id','comment_id','reply_id',
        'likes_count', 'dislikes_count'
    ];

    public $timestamps = false;

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likable');
    }

    public function reply()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }

}
