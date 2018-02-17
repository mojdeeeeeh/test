<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['value'];

    protected $guarded = [
        'id'
    ];
    
    public $timestamps = false;

    public function posts()
    {
    	return $this->belongsToMany(\App\Post::class);
    } 

    
   public static function readOrInsert ($value)
    {
        $tag = \App\Tag::where('value', $value)
                        ->first();

        if(is_null ($tag))
        {
            $tag = \App\Tag::create([
                'value' => $value
            ]);
        }

        return $tag;
    }
}
