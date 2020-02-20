<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientlogo extends Model
{
    protected $table = 'client_logo';
    
  	protected $fillable = [
        'image', 'activate','url'
   	];
}
