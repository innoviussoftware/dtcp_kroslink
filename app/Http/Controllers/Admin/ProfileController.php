<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use Illuminate\Support\Facades\Crypt;

class ProfileController extends Controller
{
    //
     public function index()
    {
    	return view('admin.profile.index');
    }

    public function addprofile()
    {
    	return view('admin.profile.add');
    }

    public function storeprofile(Request $request)
    {
    	// $this->validate($request, [
     //      'image' => 'required|dimensions:min_width=1430,min_height=558',
     //  	],
     //  		['image.dimensions'=>'Image size must be width 1430 and height 558',]
     //  	);

      	$this->validate($request, [
          'name' => 'required',
          'role' => 'required',
          'image' => 'required',
      	]);

        $Profile = new Profile;
        if ($request->file('image')) {
            $image = $request->image;
            $path = $image->store('profile_images');
        }
        $Profile->name = request('name');
        $Profile->role = request('role');
        $Profile->image = isset($path)?$path:'';
        $Profile->save();

        return redirect()->route('admin.profile')->with("success","Profile added successfully.");
    }

    public function editprofile($id)
    {
    	$Profile=Profile::find($id);
    	if($Profile)
    	{
          return view('admin.profile.edit',["Profile" => $Profile]);
        }
        else
        {
          return view('admin.errors.404');
        }
    }

    public function updateprofile(Request $request,$id)
    {
      	$Profile=Profile::find($id);

    	if($Profile)
    	{
            if ($request->file('image')) {
	            $image = $request->image;
	            $path = $image->store('slider_images');
        	}
        	else
        	{
        		$path=$request->hiddenimages;
        	}
        	$Profile->image = isset($path)?$path:'';
          	$Profile->save();
        }

        return redirect()->route('admin.profile')->with('success','Profile updated successfully.');
    }

    public function deleteprofile($id)
    {

    	$Profile = Profile::find($id);

        if($Profile){
          $Profile->delete();
        }

        return redirect()->route('admin.profile')->with('success','Profile deleted successfully.');

    }

    public function arrayProfile(Request $request)
    {
    		$response = [];

            $Menu = Profile::all();

            foreach ($Menu as $m) {
                $sub = [];

                $id = $m->id;

                $sub[] = $id;

                $sub[] = $m->name;

                if($m->image)
                {
                	$sub[] = '<img src="'.env('APP_URL_STORAGE').''.$m->image.'" width="250" height="50">';	
                }

                $sub[] = $m->role; 

                $delete_url = route('admin.profile.delete', ["id" => $id]);

                $action = '<div class="btn-part"><a class="edit" href="' . route('admin.profile.editprofile', $id) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';

                $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"><i class="fa fa-trash"></i>&nbsp;</a></div>';

                $sub[] = $action;

                $response[] = $sub;
            }

            $userjson = json_encode(["data" => $response]);

            echo $userjson;
    }

    public function changestatus($id,$status)
    {
        $update_attributes = array('activate' => $status);        

        $user = Profile::where('id',$id)->update(['activate'=>$status]);
            
        if ($status == 1) {
                $msg = 'Images is activated.';
        } elseif ($status == 0) {
                $msg = 'Images is not activated.';
        }

        return redirect()->route('admin.profile')->with('success', $msg);
    }
}
