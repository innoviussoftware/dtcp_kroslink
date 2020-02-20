<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Whatsnew extends Model
{    
    protected $table = 'whatsnew';
    
    protected $fillable = [
        'title', 'url','flag','tamil_title'
    ];
}
