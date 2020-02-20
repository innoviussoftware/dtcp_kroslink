<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\Helpers\logs\LogsDetails;

class CategoryController extends Controller
{
    //
     public function index()
    {
    	return view('admin.category.index');
    }

    public function addCategory()
    {
    	return view('admin.category.add');
    }

    public function storeCategory(Request $request)
    {
    	// $this->validate($request, [
     //      'image' => 'required|dimensions:min_width=1430,min_height=558',
     //  	],
     //  		['image.dimensions'=>'Image size must be width 1430 and height 558',]
     //  	);

      	$this->validate($request, [
          'name' => 'required|unique:category',
      	]);

        $Category = new Category;
        $Category->name = request('name');
        if ($request->file('image')) {
            $image = $request->image;
            $path = $image->store('category_images');
        }
        $Category->image = isset($path)?$path:'';
        $Category->save();

        return redirect()->route('admin.category')->with("success","Category added successfully.");
    }

    public function editCategory($id)
    {
        $encryid = Crypt::decryptString($id);
    	$Category=Category::find($encryid);
    	if($Category)
    	{
          return view('admin.category.edit',["Category" => $Category]);
        }
        else
        {
          return view('admin.errors.404');
        }
    }

    public function updateCategory(Request $request,$id)
    {
        $this->validate($request, [
          'name' => 'required|unique:category,name,'.$id,
        ]);

      	$Category=Category::find($id);

    	if($Category)
    	{
    		$Category->name = request('name');
            if ($request->file('image')) {
	            $image = $request->image;
	            $path = $image->store('slider_images');
        	}
        	else
        	{
        		$path=$request->hiddenimages;
        	}
        	$Category->image = isset($path)?$path:'';
          	$Category->save();
            LogsDetails::StoreLogs('gallery', $request->all());
        }

        return redirect()->route('admin.category')->with('success','Category updated successfully.');
    }

    public function deleteCategory($id)
    {
         $encryid = Crypt::decryptString($id);
    	$Category = Category::find($encryid);

        if($Category){
          $Category->delete();
        }

        return redirect()->route('admin.category')->with('success','Category deleted successfully.');

    }

    public function arrayCategory(Request $request)
    {
    		$response = [];

            $Menu = Category::all();

            foreach ($Menu as $m) {
                $sub = [];

                $id = $m->id;

                $sub[] = $id;

                $sub[] = $m->name;

                if($m->image)
                {
                	$sub[] = '<img src="'.env('APP_URL_STORAGE').''.$m->image.'" width="150" height="50" class="img-responsive">';	
                }

                $encryptid = Crypt::encryptString($id);
                
                if(Auth::user()->can(['category-active'])){
                    if($m->activate==1)
                    {
                        $verified_url = route('admin.category.changestatus',["id" => $encryptid,"status"=>0]);
                        $sub[] = '<a data-toggle="tooltip" title="click here to inactive" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactivate this image ?`)"  href="#"><label class="label label-success">Active</label></a>' . ' ';
                    }
                    elseif($m->activate==0)
                    {
                        $verified_url = route('admin.category.changestatus',["id" =>$encryptid,"status"=>1]);
                        
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

                                
                $delete_url = route('admin.category.delete', ["id" => $encryptid]);
                $action = '';
                
                
                if(Auth::user()->can('gallery-edit') && Auth::user()->can('gallery-delete')){
                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.category.editcategory', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';

                    $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"><i class="fa fa-trash"></i>&nbsp;</a></div>';
                }elseif(Auth::user()->can('gallery-edit')){

                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.category.editcategory', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . '</div>';

                }elseif (Auth::user()->can('gallery-delete')) {
                    $action = '<div class="btn-part"><a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"><i class="fa fa-trash"></i>&nbsp;</a></div>';
                }else
                {
                    $action .='';
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

        $user = Category::where('id',$encryid)->update(['activate'=>$status]);
            
        if ($status == 1) {
                $msg = 'Category active successfully.';
        } elseif ($status == 0) {
                $msg = 'Category Inactive successfully.';
        }

        return redirect()->route('admin.category')->with('success', $msg);
    }
}
