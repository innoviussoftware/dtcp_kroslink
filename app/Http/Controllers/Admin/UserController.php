<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Submenu;
use App\User;
use App\Role;
use App\Permission;
use App\PermissionRole;
use App\RoleUser;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
    	return view('admin.users.index');
    }

    public function adduser()
    {
    	$role=Role::all();
    	return view('admin.users.add',['role'=>$role]);
    }

    public function storeuser(Request $request)
    {
      	$this->validate($request, 
      		[
	          'email' => 'required|email|unique:users',
	      	],
	      	[
	      		'email.unique'=>'Sorry! Email address already exists'
	      	]
      	);

        $User = new User;
        $User->name = request('name');
        $User->email = request('email');
        $User->password = Hash::make(request('password'));
        $User->save();
        $roles=request('roles');
        $User->attachRole($roles);


        return redirect()->route('admin.users')->with("success","Users added successfully.");
    }

    public function edituser($id)
    {
        $encryid = Crypt::decryptString($id);
    	$User=User::find($encryid);
        
        $role=Role::all();
    	if($User)
    	{
          return view('admin.users.edit',["User" => $User,"role"=>$role]);
        }
        else
        {
          return view('admin.errors.404');
        }
    }

    public function updateuser(Request $request,$id)
    {
        $this->validate($request, 
        	[
	          'email' => 'required|email|unique:users,email,'.$id,
	      	],
	      	[
	      		'email.unique'=>'Sorry! Email address already exists'
	      	]
      	);

      	$User=User::find($id);

    	if($User)
    	{
    		$User->name = request('name');
        	$User->email = request('email');
          	$User->save();
            // 
            $roles=request('roles');
            $per=RoleUser::where('user_id',$id)->delete(); 
            $User->attachRole($roles);
        }

        return redirect()->route('admin.users')->with('success','Users updated successfully.');
    }

    public function deleteuser($id)
    {
         $encryid = Crypt::decryptString($id);
    	$User = User::find($encryid);

        if($User){
          $User->delete();
        }

        return redirect()->route('admin.users')->with('success','Users deleted successfully.');

    }

    public function arrayUsers(Request $request)
    {
    		$response = [];

            $Menu = User::all();

            foreach ($Menu as $m) {
                $sub = [];

                $id = $m->id;

                $sub[] = $id;

                $sub[] = $m->name;

                $sub[] = $m->email;

				$sub[] = isset($m->roles->first()->name)?$m->roles->first()->name:'';                
                $encryptid = Crypt::encryptString($id);
                
                $delete_url = route('admin.users.delete', ["id" => $encryptid]);

                $action = '<div class="btn-part"><a class="edit" href="' . route('admin.users.editusers', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';

                $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"><i class="fa fa-trash"></i>&nbsp;</a></div>';

                $sub[] = $action;

                $response[] = $sub;
            }

            $userjson = json_encode(["data" => $response]);

            echo $userjson;
    }

    public function changestatus($id,$status)
    {
        $encryid = Crypt::decryptString($id);
        
        $update_attributes = array('activate' => $status);        

        $user = Gallery::where('id',$encryid)->update(['activate'=>$status]);
            
        if ($status == 1) {
                $msg = 'Image active successfully.';
        } elseif ($status == 0) {
                $msg = 'Image Inactive successfully.';
        }

        return redirect()->route('admin.gallery')->with('success', $msg);
    }
}
