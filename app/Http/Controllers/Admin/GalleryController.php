<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\Helpers\logs\LogsDetails;
use App\Category;
use App\GalleryImages;

class GalleryController extends Controller
{
    //
    public function index()
    {
    	return view('admin.gallery.index');
    }

    public function addslider()
    {
        $category=Category::where('activate',1)->get();
    	return view('admin.gallery.add',['category'=>$category]);
    }

    public function storeslider(Request $request)
    {
    	// $this->validate($request, [
     //      'image' => 'required|dimensions:min_width=1430,min_height=558',
     //  	],
     //  		['image.dimensions'=>'Image size must be width 1430 and height 558',]
     //  	);

      	$this->validate($request, [
          'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
      	]);
 
        $Gallery = new Gallery;
        $Gallery->category_id=request('category');
        $Gallery->description=request('description');
        $Gallery->save();

        $id=$Gallery->id;
        $images=$request->file('image');
        if(count($images) > 8)
        {
            return back()->with('success','Sorry! you can not add more then 8 image');
        }
        else
        {
            foreach ($images as $key=>$value) {
                
                $image = $value;
                $path = $image->store('gallery_images');

                if($key==0)
                {
                    Gallery::where('id',$id)->update(['image'=>$path]);
                }
                else
                {
                    $GalleryImages = new GalleryImages;
                    $GalleryImages->gallery_id =$id;
                    $GalleryImages->images =$path;
                    $GalleryImages->save();
                }

                
            }
        }
        
        return redirect()->route('admin.gallery')->with("success","Gallery added successfully.");
    }

    public function editslider($id)
    {
        $encryid = Crypt::decryptString($id);
    	$Gallery=Gallery::find($encryid);
        $category=Category::where('activate',1)->get();
    	if($Gallery)
    	{
            $GalleryImages=GalleryImages::where('gallery_id',$encryid)->get();
          return view('admin.gallery.edit',["Gallery" => $Gallery,'category'=>$category,'GalleryImages'=>$GalleryImages]);
        }
        else
        {
          return view('admin.errors.404');
        }
    }

    public function updateslider(Request $request,$id)
    {
        // $this->validate($request, [
        //   'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        // ]);

      	$Gallery=Gallery::find($id);

    	if($Gallery)
    	{
            $images=$request->file('image');
              
            if(isset($images))
            {

                if(count($images) > 8)
                {
                   
                    return back()->with('success','Sorry! you can not add more then 8 image');
                }
                else
                {

                    if(isset($images))
                    {       

                            GalleryImages::where('gallery_id',$id)->delete();

                            foreach ($images as $key=>$value) {
                                
                                $image = $value;
                                $path = $image->store('gallery_images');
                                
                                if($key==0)
                                {
                                    Gallery::where('id',$id)->update(['image'=>$path]);
                                }
                                else
                                {

                                    $GalleryImages = new GalleryImages;
                                    $GalleryImages->gallery_id =$id;
                                    $GalleryImages->images =$path;
                                    $GalleryImages->save();
                                }
                            }
                    }
                    else
                    {
                        
                        $hiddenpath=request('gallery');
                    }
                }
            }
            else
            {
                $hiddenpath=request('gallery');
            }

           
        	$Gallery->image = isset($path)?$path:$hiddenpath;
            $Gallery->description=request('description');
          	$Gallery->save();
            // LogsDetails::StoreLogs('gallery', $request->all());
        }

        return redirect()->route('admin.gallery')->with('success','Gallery updated successfully.');
    }

    public function deleteslider($id)
    {
         $encryid = Crypt::decryptString($id);
    	$Gallery = Gallery::find($encryid);

        if($Gallery){
          $Gallery->delete();
        }

        return redirect()->route('admin.gallery')->with('success','Gallery deleted successfully.');

    }

    public function arraySlider(Request $request)
    {
    		$response = [];

            $Menu = Gallery::all();

            foreach ($Menu as $m) {
                $sub = [];

                $id = $m->id;

                $sub[] = $id;
                
                $category_id=Category::where('id',$m->category_id)->first();

                $sub[] = isset( $category_id)?$category_id->name:'-';

                $sub[] =$m->description;

                $slider = GalleryImages::where('gallery_id',$id)->get();

                $gallery_images=Gallery::where('id',$id)->first();
                
                $image=[];
                $image[]='<img src="'.env('APP_URL_STORAGE').''.$gallery_images->image.'" width="100" height="50">';
                foreach ($slider as  $value) {
                    $image[] = '<img src="'.env('APP_URL_STORAGE').''.$value->images.'" width="100" height="50">';   
                }
                
                // $newimage= '<img src="'.env('APP_URL_STORAGE').''.$gallery_images->image.'" width="100" height="50">';
                // // dd($image);
                // array_push($image,$newimage);
                
                $sub[] = $image;

                $encryptid = Crypt::encryptString($id);

                if(Auth::user()->can('gallery-active'))
                {
                    if($m->activate==1)
                    {
                        $verified_url = route('admin.gallery.changestatus',["id" => $encryptid,"status"=>0]);
                        $sub[] = '<a data-toggle="tooltip" title="click here to inactive" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactivate this image ?`)"  href="#"><label class="label label-success">Active</label></a>' . ' ';
                    }
                    elseif($m->activate==0)
                    {
                        $verified_url = route('admin.gallery.changestatus',["id" =>$encryptid,"status"=>1]);
                        
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
                       
                        
                        $sub[] = '<label class="label label-danger">In-Active</label> ';
                    }
                }

                


                                
                $delete_url = route('admin.gallery.delete', ["id" => $encryptid]);
                $action = '';
                
                
                if(Auth::user()->can('gallery-edit') && Auth::user()->can('gallery-delete')){
                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.gallery.editgallery', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';

                    $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"><i class="fa fa-trash"></i>&nbsp;</a></div>';
                }elseif(Auth::user()->can('gallery-edit')){

                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.gallery.editgallery', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . '</div>';

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

        $user = Gallery::where('id',$encryid)->update(['activate'=>$status]);
            
        if ($status == 1) {
                $msg = 'Image active successfully.';
        } elseif ($status == 0) {
                $msg = 'Image Inactive successfully.';
        }

        return redirect()->route('admin.gallery')->with('success', $msg);
    }
}
