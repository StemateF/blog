<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialProfile extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeAttempt($query, $id, $type)
    {
        return $query->where(
            [
                ['profile_id', '=', $id],
                ['type', '=', $type],
            ]
        );
    }
}
