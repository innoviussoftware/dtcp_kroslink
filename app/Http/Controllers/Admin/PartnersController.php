<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clientlogo;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\Helpers\logs\LogsDetails;
class PartnersController extends Controller
{
    //
    public function index()
    {
    	return view('admin.partners.index');
    }

    public function addpartners()
    {
    	return view('admin.partners.add');
    }

    public function storepartners(Request $request)
    {
    	// $this->validate($request, [
     //      'image' => 'required|dimensions:min_width=1430,min_height=558',
     //  	],
     //  		['image.dimensions'=>'Image size must be width 1430 and height 558',]
     //  	);

      	$this->validate($request, [
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        $Gallery = new Clientlogo;
        if ($request->file('image')) {
            $image = $request->image;
            $path = $image->store('partners_images');
        }
        $Gallery->image = isset($path)?$path:'';
        $Gallery->url = request('url');
        $Gallery->save();

        return redirect()->route('admin.partners')->with("success","Partnerslogo added successfully.");
    }

    public function editpartners($id)
    {
    	$encryid = Crypt::decryptString($id);
    	$Gallery=Clientlogo::find($encryid);
    	if($Gallery)
    	{
          return view('admin.partners.edit',["Gallery" => $Gallery]);
        }
        else
        {
          return view('admin.errors.404');
        }
    }

    public function updatepartners(Request $request,$id)
    {
        $this->validate($request, [
          'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);


      	$Gallery=Clientlogo::find($id);

    	if($Gallery)
    	{
            if ($request->file('image')) {
	            $image = $request->image;
	            $path = $image->store('partners_images');
        	}
        	else
        	{
        		$path=$request->hiddenimages;
        	}
        	$Gallery->image = isset($path)?$path:'';
            $Gallery->url = request('url');
          	$Gallery->save();
            // LogsDetails::StoreLogs('partners-logo', $request->all());
        }

        return redirect()->route('admin.partners')->with('success','Partnerslogo updated successfully.');
    }

    public function deletepartners($id)
    {
        $encryid = Crypt::decryptString($id);
    	$Gallery = Clientlogo::find($encryid);

        if($Gallery){
          $Gallery->delete();
        }

        return redirect()->route('admin.partners')->with('success','Partnerslogo deleted successfully.');

    }

    public function arrayPartners(Request $request)
    {
    		$response = [];

            $Menu = Clientlogo::all();

            foreach ($Menu as $m) {
                $sub = [];

                $id = $m->id;

                $sub[] = $id;

                if($m->image)
                {
                	$sub[] = '<img src="'.env('APP_URL_STORAGE').''.$m->image.'" width="250" height="50">';	
                }
                $sub[] = $m->url;

                $encryptid = Crypt::encryptString($id);
                
                if(Auth::user()->can(['logo-active']))
                {
                    if($m->activate==1)
                    {
                        $verified_url = route('admin.partners.changestatus',["id" => $encryptid,"status"=>0]);
                        $sub[] = '<a data-toggle="tooltip" title="click here to inactive" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactivate this image ?`)"  href="#"><label class="label label-success">Active</label></a>' . ' ';
                    }
                    elseif($m->activate==0)
                    {
                        $verified_url = route('admin.partners.changestatus',["id" =>$encryptid,"status"=>1]);
                        
                        $sub[] = '<a data-toggle="tooltip" title="click here to active" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to activate this image ?`)"  href="#"><label class="label label-danger">In-Active</label></a>' . ' ';
                    }
                }
                else
                {
                   if($m->activate==1)
                    {
                      
                        $sub[] = '<label class="label label-success">Active</label>';
                    }
                    elseif($m->activate==0)
                    {
                        
                        $sub[] = '<label class="label label-danger">In-Active</label>';
                    }
                }
                                
                $delete_url = route('admin.partners.delete', ["id" => $encryptid]);

                if(Auth::user()->can(['logo-edit']) && Auth::user()->can(['logo-delete']))
                {
                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.partners.editpartners', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';

                    $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"><i class="fa fa-trash"></i>&nbsp;</a></div>';
                }elseif (Auth::user()->can(['logo-delete'])) {
                    $action = '<div class="btn-part"><a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"><i class="fa fa-trash"></i>&nbsp;</a></div>';
                }elseif (Auth::user()->can(['logo-edit'])) {
                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.partners.editpartners', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . '</div>';
                }else{
                    $action .= '';
                }

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

        $user = Clientlogo::where('id',$encryid)->update(['activate'=>$status]);
            
        if ($status == 1) {
                $msg = 'Logo active successfully.';
        } elseif ($status == 0) {
                $msg = 'Logo inactive successfully.';
        }

        return redirect()->route('admin.partners')->with('success', $msg);
    }
}
