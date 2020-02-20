<?php
namespace App\Helpers\logs;

use Illuminate\Support\Facades\DB;
use App\User;
use App\LogDetails;
use Auth;

class LogsDetails
{
	
	public static function StoreLogs($name, $data)
    {
    	$json = json_encode($data);
    	$user_id=Auth::user()->id;
       	$logs=new LogDetails;
       	$logs->module_name=$name;
       	$logs->data=$json;
       	$logs->user_id=$user_id;
       	$logs->save();
    }


}

?>
