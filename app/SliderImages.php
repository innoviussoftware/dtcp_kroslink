<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderImages extends Model
{
    //
    protected $table = 'slider_images';
    
   	protected $fillable = [
        'slider_id', 'images'
   	];

}
