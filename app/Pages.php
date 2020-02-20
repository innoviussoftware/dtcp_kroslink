<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    //
   	protected $table = 'pages';
    
  	protected $fillable = [
        'title','menu_id','url','alias','page_content','meta_target','meta_keyword','meta_details','tamil_title','tamil_content'
   	];

   	public function menu()
    {
        return $this->hasMany('App\Menu','id');
    }

    public function submenu()
    {
        return $this->hasMany('App\Submenu','id');
    }

    public function pages()
    {
        return $this->belongsTo('App\Pages','id');
    }
}
