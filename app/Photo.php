<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Photo extends Model
{

    protected $fillable = [
        'title', 'extra', 'gallery_id'
    ];
    
    protected $guarded = [
        'id'
    ];

    public $casts = [
        'extra' => 'array'
    ];


    /**
     * Set image
     * @param Request $request [description]
     */
    public function setImage(Request $request, $imageFieldName)
    {
        $file = $request->file($imageFieldName);

        if (is_null ($file))
        {
            return;
        }

        $path = \Storage::disk('public')->putFile('photos/images/', $file);

        $extra = $this->extra;
        $extra['image_path'] = $path;
        $this->extra = $extra;

        $this->save();

        return $path;
    }

    /**
     * Get image path
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

     public function gallery()
    {
        return $this->belongsTo(\App\Gallery::class);
    }

    /**
     * Delete photo
     * @param  Photo  $photo [description]
     * @return [type]        [description]
     */
    public function removePhoto()
    {
        \Storage::disk('public')->delete($this->getImage());

        $this->delete();
    }
}
