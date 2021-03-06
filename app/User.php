<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;


class User extends Authenticatable
{
    use Notifiable;

    public $casts = [
        'extra' => 'array'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'extra'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Set User image
     * @param Request $request [description]
     */
    public function setImage(Request $request, $imageFieldName)
    {
        $file = $request->file($imageFieldName);

        if (is_null ($file))
        {
            return;
        }

        $path = \Storage::disk('public')->putFile('users/images/', $file);

        $extra = $this->extra;
        $extra['image_path'] = $path;
        $this->extra = $extra;

        $this->save();

        return $path;
    }

    /**
     * Get user image path
     *
     * @return     <type>  The image.
     */
    public function getImage()
    {
        if (isset ($this->extra['image_path']))
        {
            return $this->extra['image_path'];
        }

        return "";    
    }
}
