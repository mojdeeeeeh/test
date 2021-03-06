<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [
        'id'
    ];
    
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Comment::class);
    }

     public function tags()
    {
        return $this->belongsToMany(\App\Tag::class);
    }
}
