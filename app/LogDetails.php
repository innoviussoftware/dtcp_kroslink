<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogDetails extends Model
{    
    protected $table = 'logs_details';
    
   	protected $fillable = [
        'module_name', 'user_id','data'
   	];
}
