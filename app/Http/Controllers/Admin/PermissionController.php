<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\Crypt;

class PermissionController extends Controller
{
    //
    public function index()
    {
    	return view('admin.permissions.index');
    }

    public function addpermission()
    {
    	return view('admin.permissions.add');
    }

    public function storepermission(Request $request)
    {
    	$this->validate($request, [
          	'name' => 'required|unique:permissions',
        ],
	    [
	        'name.unique'=>'Sorry! This Permissions already created.',
	    ]
    	);
    	
    	$Permission = new Permission;
	    $Permission->name = request('name');
	    $Permission->display_name = request('name');
	    $Permission->save();

	    return redirect()->route('admin.permissions')->with("success","Permission added successfully.");
    }

    public function editpermission($id)
    {
        $encryid = Crypt::decryptString($id);
    	$Permission=Permission::find($encryid);
    	if($Permission)
    	{
          return view('admin.permissions.edit',["Permission" => $Permission]);
        }
        else
        {
          return view('admin.errors.404');
        }
    }

    public function updatepermission(Request $request,$id)
    {
    	$this->validate($request, [
          	'name' => 'required|unique:permissions,name,'.$id,
        ],
	    [
	        'name.unique'=>'Sorry! This Permissions already created.',
	    ]
    	);

      	$Permission=Permission::find($id);

    	if($Permission)
    	{
        	$Permission->name = request('name');
	        $Permission->display_name = request('name');
          	$Permission->save();
        }

        return redirect()->route('admin.permissions')->with('success','Permission updated successfully.');
    }

    public function deletepermission($id)
    {
        $encryid = Crypt::decryptString($id);
    	$Permission = Permission::find($encryid);

        if($Permission){
          $Permission->delete();
        }

        return redirect()->route('admin.permissions')->with('success','Permission deleted successfully.');

    }

    public function arrayPermission(Request $request)
    {
    		$response = [];

            $Menu = Permission::all();

            foreach ($Menu as $m) {
                $sub = [];

                $id = $m->id;

                $sub[] = $id;

                $sub[] = $m->name;

                $encryptid = Crypt::encryptString($id);
                   
                $delete_url = route('admin.permissions.delete', ["id" => $encryptid]);

                //$action = '<div class="btn-part"><a class="edit" href="' . route('admin.permissions.editpermissions', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';

                $action = '<div class="btn-part"><a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"><i class="fa fa-trash"></i>&nbsp;</a></div>';

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
