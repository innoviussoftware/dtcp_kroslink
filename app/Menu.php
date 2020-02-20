<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
 	protected $table = 'menus';
    
   	protected $fillable = [
        'name', 'url','page_id','sorted','tamilname'
   	];

   	public function submenu()
    {
        // return $this->belongsTomany('App\Submenu','id','menu_id');
    //   return $this->belongsToMany('App\Submenu', 'id', 'menu_id')
    // ->withPivot('value');
      return $this->hasMany( 'App\Submenu', 'id', 'menu_id' );
    }

    public function pages()
    {
        return $this->belongsTo('App\Pages','page_id','id');
    }
}
