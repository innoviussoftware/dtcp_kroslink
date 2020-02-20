<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';
    
   	protected $fillable = [
        'title', 'description','address','contact_number','fax','email_id','copyright','primary_logo', 'secondary_logo','favicon','facebook','twitter','linkedin','pinterest','google_plus','youtube','tamil_title','tamil_content','tamil_address','details','tamil_details','footer_details','footer_tamildetails'
   	];


}
