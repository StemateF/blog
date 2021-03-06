<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * User relation
     *
     * @return App/User::class
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)
            ->whereCommentId(null);
    }

    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = $value;
        $this->attributes['excerpt'] = str_limit(strip_tags($value));
    }
}
