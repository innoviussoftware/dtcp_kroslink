<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    
   	protected $fillable = [
        'page_id', 'activate'
   	];

   	public function pages()
    {
        return $this->belongsTo('App\Pages','page_id','id');
    }

	public function slider_images()
    {
        return $this->belongsTo('App\SliderImages','id','slider_id');
    }    



}
