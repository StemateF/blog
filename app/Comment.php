<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replays()
    {
        return $this->hasMany(Comment::class);
    }
}
