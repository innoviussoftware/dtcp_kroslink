<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\User;
use App\LogDetails;
use Auth;
use Hash;
use Validator;
use Mail;
class DashboardController extends Controller
{
    //

    public function index()
    {
    	return view('admin.dashboard');
    }

    public function changepassword()
    {
        return view('admin.changepassword');
    }

    public function resetpassword(Request $request)
    {
            $validator = Validator::make($request->all(), [
               'newpassword' => 'required|string|min:6|required_with:confirmpassword|same:confirmpassword',
               'confirmpassword'=> 'required|string|min:6'
                        ],[
                'newpassword.required'=>'New password is required',
                'confirmpassword.required'=>'Confirmpassword is required',
                'newpassword.min' => 'Password must contain at least 6 characters.',
                'newpassword.same' => 'Confirm password is not match with New password',
                'confirmpassword.min' => 'Confirmpassword must contain at least 6 characters.',
                'password.min' => 'Password must contain at least 6 characters.',
            ]);

            $errors = $validator->errors();
            if ($validator->fails()) {
                return redirect()->back()
                                ->withInput($request->all())
                                ->withErrors($errors);
                exit;
            }
            else
            {
                $user_id=Auth::user()->id;
                
                $input = $request->all();
                
                $user= User::find($user_id);

                if(!Hash::check(request('currentpassword'), $user->password))
                {
                    return redirect()->back()->withErrors('Current password is wrong');
                }
                else
                {
                    $user->password=Hash::make(request('newpassword'));

                    $user->save();
                
                    return redirect()->back()->with('success','Password Changed successfully.');
                }
            }
    }

    public function reset_password()
    {

        return view('admin.resetpassword');
    }

    public function resetpasswordsubmit(Request $request)
    {

        $validator = Validator::make($request->all(), [
                    'email' => 'required',
        ]);
        if ($validator->fails()) {
            $errorArray = $validator->errors()->all();
            
             return redirect()->back()->with('success',"We can't find a user with that e-mail address");
        }

        $user = User::where('email', $request->email)->first();

        if ($user != null) {
//            $new_pwd = rand(000000, 999999);

            $new_pwd = bin2hex(random_bytes(5)); 

            Mail::send('resetemail', ['user' => $user, 'password' => $new_pwd], function ($m) use($user) {
                 $m->from(env('SUPPORT_EMAIL'), 'DTCP');
                 $m->to($user->email)->subject('Your password reset successfully | DTCP');
            });

            $password = app('hash')->make($new_pwd);
            $user->password = $password;
            $user->save();
            
            return redirect()->back()->with('success',"We have e-mailed your password !");
        } else {
            return redirect()->back()->with('danger',"We can't find a user with that e-mail address");
        } 
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
