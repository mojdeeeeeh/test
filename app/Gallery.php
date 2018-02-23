<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Gallery extends Model
{
    public $casts = [
        'extra' => 'array'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'extra'
    ];



    /**
     * Set GALLERY image
     * @param Request $request [description]
     */
    public function setImage(Request $request, $imageFieldName)
    {
        $file = $request->file($imageFieldName);

        if (is_null ($file))
        {
            return;
        }

        $path = \Storage::disk('public')->putFile('gallery/images/', $file);

        $extra = $this->extra;
        $extra['image_path'] = $path;
        $this->extra = $extra;

        $this->save();

        return $path;
    }

    /**
     * Get gallery image path
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
