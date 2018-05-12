<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    protected $appends = ["details", "socialLinks"];
    /**
     * User Posts relation
     *
     * @return App/Post
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }


    public function profiles()
    {
        return $this->hasMany(SocialProfile::class);
    }

    public function socialLinks()
    {
        $socialLinks = $this->profiles()->pluck('type', 'url')->flip();

        return $socialLinks;
    }
    public function getSocialLinksAttribute()
    {
        return $this->socialLinks();
    }
    public function details()
    {
        return $this->profiles()->first();
    }

    public function getDetailsAttribute()
    {
        return $this->details();
    }
}
