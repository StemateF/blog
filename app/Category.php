<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function scopeByName($query, $name)
    {
        return $query->whereNormalized(str_slug($name));
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
        $this->attributes['normalized'] = str_slug($value);
    }
}
