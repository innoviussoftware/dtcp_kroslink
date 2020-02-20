<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use App\PermissionRole;
use Illuminate\Support\Facades\Crypt;
use Cache;
class RoleController extends Controller
{
    //
    function __construct()
    {

    }

    public function index()
    {
    	return view('admin.roles.index');
    }

    public function addroles()
    {
    	$permission=Permission::all();
    	return view('admin.roles.add',['permission'=>$permission]);
    }

    public function storeroles(Request $request)
    {
    	$this->validate($request, [
          	'name' => 'required|unique:roles',
        ],
	    [
	        'name.unique'=>'Sorry! This role already created.',
	    ]
    	);

        $Role = new Role;
        $Role->name = request('name');
        $Role->display_name = request('name');
        $Role->save();

        if(request('permission'))
        {
                $permission=request('permission');

                foreach ($permission as $value) {

                    $Role->attachPermission($value);
                }
        }
        
        return redirect()->route('admin.roles')->with("success","Role added successfully.");
    }

    public function editroles($id)
    {
        $encryid = Crypt::decryptString($id);
    	$Role=Role::find($encryid);
    	$permission=Permission::all();
        
    	$per=PermissionRole::where('role_id',$encryid)->pluck('permission_id')->toarray(); 
        
    	if($Role)
    	{
          return view('admin.roles.edit',["Role" => $Role,'permission'=>$permission,'per'=>$per]);
        }
        else
        {
          return view('admin.errors.404');
        }
    }

    public function updateroles(Request $request,$id)
    {
    	$this->validate($request, [
          	'name' => 'required|unique:roles,name,'.$id,
        ],
	    [
	        'name.unique'=>'Sorry! This role already created.',
	    ]
    	);
      	$Role=Role::find($id);
    	if($Role)
    	{
        	$Role->name = request('name');
        	$Role->display_name = request('name');
          	$Role->save();
          	
          	$permission=request('permission');

            if(request('permission'))
            {
                $per=PermissionRole::where('role_id',$id)->delete(); 
                foreach ($permission as $value) {
                    $Role->attachPermission($value);
                }
            }
          	
        }
        return redirect()->route('admin.roles')->with('success','Roles updated successfully.');
    }

    public function deleteroles($id)
    {
        $encryid = Crypt::decryptString($id);
    	$Role = Role::find($encryid);

        if($Role){
          $Role->delete();
        }

        return redirect()->route('admin.roles')->with('success','Roles deleted successfully.');

    }

    public function arrayRoles(Request $request)
    {
    		$response = [];

            $Menu = Role::all();

            foreach ($Menu as $m) {
                $sub = [];

                $id = $m->id;

                $sub[] = $id;

                $sub[] = ucfirst($m->name);
               
                $encryptid = Crypt::encryptString($id);
                                
                $delete_url = route('admin.roles.delete', ["id" => $encryptid]);

                $action = '<div class="btn-part"><a class="edit" href="' . route('admin.roles.editroles', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';

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
