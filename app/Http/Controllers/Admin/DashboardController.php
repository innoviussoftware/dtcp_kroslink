<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\User;
use App\LogDetails;
use Auth;
class DashboardController extends Controller
{
    //

    public function index()
    {
    	return view('admin.dashboard');
    }

    public function log_index()
    {
    	return view('admin.activity_logs.index');
    }

    public function log_array()
    {
    	$response = [];

            $Logs = LogDetails::all();

            foreach ($Logs as $l) {
                $sub   = [];

                $id    = $l->id;

                $sub[] = $id;

                $user=User::where('id',$l->user_id)->first();

                $sub[] = isset($user->name)?$user->name:'-';

                $sub[] = $l->module_name;

                $dec = json_decode($l->data);

                $sub[] = isset($dec->title)?$dec->title:'';

                $sub[] = date('d-m-Y g:i a',strtotime($l->created_at));

                $response[] = $sub;
            }

            $userjson = json_encode(["data" => $response]);

            echo $userjson;
    }

    
}
