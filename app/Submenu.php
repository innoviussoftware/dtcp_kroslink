<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{    
    protected $table = 'submenus';
    
    protected $fillable = [
        'name', 'url','menu_id','page_id','sorted','tamil_name'
    ];

    public function menu()
    {
        return $this->belongsTo('App\Menu','menu_id');
    }

     public function pages()
    {
        return $this->belongsTo('App\Pages','page_id','id');
    }
}
