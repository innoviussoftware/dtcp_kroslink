<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{    
    protected $table = 'gallery';
    
   	protected $fillable = [
        'image', 'activate','category_id','description'
   	];

   	public function category()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }   
}
