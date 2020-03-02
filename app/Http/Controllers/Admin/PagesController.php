<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages;
use App\Menu;
use App\Submenu;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\Helpers\logs\LogsDetails;
use Entrust;
class PagesController extends Controller
{

    public function __construct()
    {
    //     $this->middleware(['permission:page-edit','permission:page-add','permission:page-view','permission:page-delete']);
    }

    public function index()
    {
        return view('admin.pages.index');
    }

    public function addpages()
    {
        $Menu = Menu::get()->toArray();
        $menulist = array();
        $value['submenu'] = array();
        $value['is_submenu'] = 0;
        foreach ($Menu as $key => $value) {
            $sub = Submenu::where('menu_id',$value['id'])->get()->toArray();
            if(!empty($sub)){
                $value['submenu'] = $sub;
                $value['is_submenu'] = 1;
            }
            $menulist[] = $value;
        }
        return view('admin.pages.add',['menulist'=>$menulist]);
    }

    public function storepages(Request $request)
    {
        $this->validate($request, [
             'bannerimage' => 'mimes:jpeg,bmp,png,jpg|max:2048'
            ],
            [
             'bannerimage.dimensions'=>'Image size must be width 1200'
            ]
        );

        $title=$this->seo_friendly_url(request('title'));        
        $url=env('APP_URL').'/'.strtolower($title);
        $url_find=Pages::where('url',$url)->first();
        if($url_find)
        {
            $newurl=env('APP_URL').'/'.strtolower($title).'2';
        }
        else
        {
            $newurl=$url;
        }

         if ($request->file('bannerimage')) {
            $image = $request->bannerimage;
            $path = $image->store('bannerimage');
        }
        $Pages = new Pages;
        $Pages->title = request('title');
        $Pages->bannerimage =isset($path)?$path:'';
        $Pages->url = $newurl;
        $Pages->alias = strtolower($title);
        $Pages->page_content = request('content');
        $Pages->page_content = request('content');
        $Pages->meta_target = request('metatarget');
        $Pages->meta_keyword = request('metakeyword');
        $Pages->meta_details = request('metadetails');
        $Pages->external_url = request('externalurl');
        $Pages->tamil_title = request('tamiltitle');
        $Pages->tamil_content = request('tamilcontent');
        $Pages->save();
        return redirect()->route('admin.pages')->with("success","Pages added successfully.");
    }

    public function editpages($id)
    {   
        $encryid = Crypt::decryptString($id);
        $Pages = Pages::find($encryid);
        $Menu = Menu::get()->toArray();
        $menulist = array();
        $value['submenu'] = array();
        $value['is_submenu'] = 0;
        foreach ($Menu as $key => $value) {
            $sub = Submenu::where('menu_id',$value['id'])->get()->toArray();
            if(!empty($sub)){
                $value['submenu'] = $sub;
                $value['is_submenu'] = 1;
            }
            $menulist[] = $value;
        }
        return view('admin.pages.edit',['Pages'=>$Pages,'menulist'=>$menulist]);
    }

    public function updatepages(Request $request,$id)
    {
        $this->validate($request, [
             'bannerimage' => 'mimes:jpeg,bmp,png,jpg|max:2048'
            ],
            [
             'bannerimage.dimensions'=>'Image size must be width 1200'
            ]
        );

        $Pages=Pages::find($id);
        if($Pages)
        {
            
            $title=$this->seo_friendly_url(request('title'));
            $tamil_title=$this->seo_friendly_url(request('tamiltitle'));
            $url=env('APP_URL').'/'.strtolower($title);
            
            if($url == $Pages->url)
            {
                $Pages->url = $url;
            }
            else
            {
                $url_find=Pages::where('url',$url)->first();
                if($url_find)
                {
                    $newurl=env('APP_URL').'/'.strtolower($title).'2';
                }
                else
                {
                    $newurl=$url;
                }
                $Pages->url = $newurl;
            }

            if ($request->file('bannerimage')) {
                $image = $request->bannerimage;
                $path = $image->store('bannerimage');
            }
            else
            {
                $path = $request->bannerimagepath;
            }
            $Pages->title = request('title');
            $Pages->alias = strtolower($title);
            $Pages->bannerimage =isset($path)?$path:'';
            $Pages->page_content = request('content') ;
            $Pages->meta_target = request('metatarget');
            $Pages->meta_keyword = request('metakeyword');
            $Pages->meta_details = request('metadetails');
            $Pages->external_url = request('externalurl');
            $Pages->tamil_title = request('tamiltitle');
            $Pages->tamil_content = request('tamilcontent');
            $Pages->save();

            LogsDetails::StoreLogs('pages', $request->all());
        }
        return redirect()->route('admin.pages')->with('success','Pages updated successfully.');
    }

    public function deletepages(Request $request,$id)
    {
        $encryid = Crypt::decryptString($id);
        $Pages = Pages::find($encryid);
        if($Pages){
          $Pages->delete();
        }
        return redirect()->route('admin.pages')->with('success','Pages deleted successfully.');
    }

    public function Arraypages(Request $request)
    {
            $response = [];

            $news = Pages::all();

            foreach ($news as $n) {
                $sub   = [];

                $id    = $n->id;

                $sub[] = $id;

                $sub[] = $n->title;

                $sub[] = $n->meta_target;

                $sub[] = $n->meta_keyword;

                $sub[] = $n->meta_details;

                $sub[]='<a class="btn btn-secondary" data-toggle="'.$n->url.'"  data-placement="top" title="'.$n->url.'">'.substr($n->url,0,15).'
                    </a>';

                $encryptid = Crypt::encryptString($id);

                $delete_url = route('admin.pages.delete', ["id" => $encryptid]);
                
                $action = '';
                if(Auth::user()->can(['page-edit']) && Auth::user()->can(['page-delete']))
                {   
                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.pages.editpages', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';
                    $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"  ><i class="fa fa-trash"></i>&nbsp;</a></div>';
                }elseif (Auth::user()->can('page-edit')) {
                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.pages.editpages', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . '</div> ';
                }elseif (Auth::user()->can('page-delete')) {
                    $action = '<div class="btn-part"><a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"  ><i class="fa fa-trash"></i>&nbsp;</a></div>';
                }else{
                    $action .= '';
                }               

                if(Auth::user()->can(['page-active'])){
                    if($n->status==1)
                    {
                        $verified_url = route('admin.pages.changestatus',["id" => $encryptid,"status"=>0]);
                        $sub[] = '<a data-toggle="tooltip" title="click here to inactive" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactivate this page ?`)"  href="#"><label class="label label-success">Active</label></a>' . ' ';
                    }
                    elseif($n->status==0)
                    {
                        $verified_url = route('admin.pages.changestatus',["id" =>$encryptid,"status"=>1]);
                        
                        $sub[] = '<a data-toggle="tooltip" title="click here to active" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to activate this page ?`)"  href="#"><label class="label label-danger">In-Active</label></a>' . ' ';
                    }
                }
                
                else
                {
                    if($n->status==1)
                    {
                       
                        $sub[] = '<label class="label label-success">Active</label>';
                    }
                    elseif($n->status==0)
                    {
                        $sub[] = '<label class="label label-danger">In-Active</label>';
                    }
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
        
        $update_attributes = array('status' => $status);        

        $user = Pages::where('id',$encryid)->update(['status'=>$status]);
            
        if ($status == 1) {
                $msg = 'Page active successfully.';
        } elseif ($status == 0) {
                $msg = 'Page inactive successfully.';
        }

        return redirect()->route('admin.pages')->with('success', $msg);
    }

    public function seo_friendly_url($string){
        $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return $string ; // Replaces multiple hyphens with single one.
    }

}
