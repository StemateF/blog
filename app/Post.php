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
    }
}
