<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use App\SliderImages;
use App\Pages;
use Illuminate\Support\Facades\Crypt;
use Auth;
class SliderController extends Controller
{
    //
    public function index()
    {
    	return view('admin.slider.index');
    }

    public function addslider()
    {
        $pages=Pages::all();
    	return view('admin.slider.add',['pages'=>$pages]);
    }

    public function storeslider(Request $request)
    {
    	
        $this->validate($request, [
          'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $Slider = new Slider;
        $Slider->page_id =request('page');
        $Slider->save();
        $id=$Slider->id;
        $images=$request->file('image');
        foreach ($images as $value) {
            $image = $value;
            $path = $image->store('slider_images');
            $Slider = new SliderImages;
            $Slider->slider_id =$id;
            $Slider->images =$path;
            $Slider->save();
        }
        

        return redirect()->route('admin.slider')->with("success","Slider added successfully.");
    }

    public function editslider($id)
    {
        $encryid = Crypt::decryptString($id);
    	$Slider=Slider::find($encryid);
        $pages=Pages::all();
    	if($Slider)
    	{
          $SliderImages=SliderImages::where('slider_id',$encryid)->get();
          return view('admin.slider.edit',["Slider" => $Slider,'pages'=>$pages,'SliderImages'=>$SliderImages]);
        }
        else
        {
          return view('admin.errors.404');
        }
    }

    public function updateslider(Request $request,$id)
    {
        $this->validate($request, [
          'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

      	$Slider=Slider::find($id);

    	if($Slider)
    	{
            $images=$request->file('image');
            if(isset($images))
            {       
                    SliderImages::where('slider_id',$id)->delete();
                    foreach ($images as $value) {
                        $image = $value;
                        $path = $image->store('slider_images');
                        $SliderImages = new SliderImages;
                        $SliderImages->slider_id =$id;
                        $SliderImages->images =$path;
                        $SliderImages->save();
                    }
            }
        	$Slider->page_id = request('page');
          	$Slider->save();
        }

        return redirect()->route('admin.slider')->with('success','Slider updated successfully.');
    }

    public function deleteslider($id)
    {
        $encryid = Crypt::decryptString($id);
    	$menu = Slider::find($encryid);

        if($menu){
          $menu->delete();
        }

        return redirect()->route('admin.slider')->with('success','Slider deleted successfully.');

    }

    public function arraySlider(Request $request)
    {
    		$response = [];

            $Menu = Slider::with('pages')->get();
            foreach ($Menu as $m) {
                $sub = [];

                $id = $m->id;

                $sub[] = $id;

                $sub[] = isset($m->pages->title)?$m->pages->title:'-';

                $slider = SliderImages::where('slider_id',$id)->get();
                
                $image=[];

                foreach ($slider as  $value) {
                    $image[] = '<img src="'.env('APP_URL_STORAGE').''.$value->images.'" width="100" height="50">';   
                }
                
                $sub[] = $image;

                $encryptid = Crypt::encryptString($id);

                if(Auth::user()->can(['slider-active'])){
                    if($m->activate==1)
                    {
                        $verified_url = route('admin.slider.changestatus',["id" => $encryptid,"status"=>0]);
                        $sub[] = '<a data-toggle="tooltip" title="click here to inactive" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactivate this image ?`)"  href="#"><label class="label label-success">Active</label></a>' . ' ';
                    }
                    elseif($m->activate==0)
                    {
                        $verified_url = route('admin.slider.changestatus',["id" =>$encryptid,"status"=>1]);
                        
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

                
                                
                $delete_url = route('admin.slider.delete', ["id" => $encryptid]);
                $action = '';
                if(Auth::user()->can(['slider-edit']) && Auth::user()->can(['slider-delete']))
                {   
                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.slider.editslider', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';

                    $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"><i class="fa fa-trash"></i>&nbsp;</a></div>';
                }elseif (Auth::user()->can(['slider-edit'])) {
                     $action = '<div class="btn-part"><a class="edit" href="' . route('admin.slider.editslider', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . '</div>';
                }elseif (Auth::user()->can(['slider-delete'])) {
                    $action = '<div class="btn-part"><a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"><i class="fa fa-trash"></i>&nbsp;</a></div>';
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

        $user = Slider::where('id',$encryid)->update(['activate'=>$status]);
            
        if ($status == 1) {
                $msg = 'Slider active successfully.';
        } elseif ($status == 0) {
                $msg = 'Slider inactive successfully.';
        }

        return redirect()->route('admin.slider')->with('success', $msg);
    }
}
