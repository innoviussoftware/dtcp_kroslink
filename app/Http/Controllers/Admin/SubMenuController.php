<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Submenu;
use App\Pages;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\Helpers\logs\LogsDetails;
class SubMenuController extends Controller
{
    //

    public function index()
    {
        return view('admin.submenu.index');
    }

    public function addsubmenu()
    {
        $menu=Menu::all();
        $pages=Pages::where('status',1)->get();
        return view('admin.submenu.add',['menu'=>$menu,'pages'=>$pages]);
    }

    public function storesubmenu(Request $request)
    {
        $this->validate($request, [
          'title' => 'required',
          'url' => 'required',
        ]);
        $menu=Menu::where('id',request('menu'))->first();
        $Submenu=Submenu::where('page_id',request('page'))->first();
        $sorted=Submenu::where('menu_id',request('menu'))->where('sorted',request('sort'))->first();
        // dd($sorted);
        if($Submenu)
        {
            return back()->with('success','Page is already assigned to other Menu.');
        }
        else
        {
            if($sorted)
            {
                return back()->with('success','Sort order is already assigned to other Menu.');
            }
            else
            {
                $page=Pages::where('id',request('page'))->first();
                $Submenu = new Submenu;
                $Submenu->name = request('title');
                $Submenu->tamil_name = request('tamiltitle');
                $Submenu->url = $page->url;
                $Submenu->menu_id = request('menu');
                $Submenu->sorted = request('sort');
                $Submenu->page_id=request('page');
                $Submenu->save();
                $page=Pages::where('id',request('page'))->update(['alias'=>strtolower(request('title'))]);

                return redirect()->route('admin.submenu')->with("success","Sub Menu added successfully.");
            }
            
        }
        
    }

    public function editsubmenu($id)
    {
        $encryid = Crypt::decryptString($id);
        $submenu=Submenu::find($encryid);
        $menu=Menu::all();
        $pages=Pages::where('status',1)->get();
        if($submenu)
        {
          return view('admin.submenu.edit',["submenu" => $submenu,"menu"=>$menu,'pages'=>$pages]);
        }
        else
        {
          return view('admin.errors.404');
        }
    }

    public function updatesubmenu(Request $request,$id)
    {
        $this->validate($request, [
           'title' => 'required',
            'url' => 'required',
        ]);

        $Submenu=Submenu::find($id);
        $menu=Menu::where('id',request('menu'))->first();
        if($Submenu)
        {
            $page=Pages::where('id',request('page'))->first();
            if(request('page') == $Submenu->page_id)
            {
                $Submenu->page_id = request('page');
            }
            else
            {
                $Submenus=Submenu::where('page_id',request('page'))->first();


                if($Submenus)
                {
                    return back()->with('success','Page is already assigned to other Menu.');
                }
                else
                {
                    $update=Submenu::where('id',$id)->update(['page_id'=>request('page')]);
                    
                }
            }

            if(request('sort') == $Submenu->sorted)
            {
                
                $update=Submenu::where('id',$id)->update(['sorted'=>request('sort')]);
            }
            else
            {
                // $sorted=Submenu::where('sorted',request('sort'))->first();
                $sorted=Submenu::where('menu_id',request('menu'))->where('sorted',request('sort'))->first();

                if($sorted)
                {
                    return back()->with('success','Sort order is already assigned to other Menu.');
                }
                else
                {
                   $update=Submenu::where('id',$id)->update(['sorted'=>request('sort')]);
                }
            }
            
            $Submenu->name = request('title');
            $Submenu->tamil_name = request('tamiltitle');
            $Submenu->url = $page->url;
            $Submenu->menu_id = request('menu');            
            $Submenu->sorted = request('sort');
            $Submenu->page_id=request('page');
            $Submenu->save();
            LogsDetails::StoreLogs('submenu', $request->all());
            $page=Pages::where('id',request('page'))->update(['alias'=>strtolower(request('title'))]);
        }

        return redirect()->route('admin.submenu')->with('success','Sub Menu updated successfully.');
    }

    public function deletesubmenu($id)
    {
        $encryid = Crypt::decryptString($id);
        $Submenu = Submenu::find($encryid);

        if($Submenu){
          $Submenu->delete();
        }

        return redirect()->route('admin.submenu')->with('success','Sub Menu deleted successfully.');

    }

    public function arraysubmenu(Request $request)
    {
            $response = [];

            $Submenu = Submenu::with('menu','pages')->orderBy('submenus.sorted')->get();

            foreach ($Submenu as $m) {
                $sub = [];

                $id = $m->id;

                $sub[] = $id;

                $sub[] = $m->name;

                $sub[] = $m->url;

                $sub[] = isset($m->menu->name)?$m->menu->name:'-';

                $sub[] = isset($m->pages->title)?$m->pages->title:'-';

                $sub[] = isset($m->sorted)?$m->sorted:'-';

                $encryptid = Crypt::encryptString($id);

                $delete_url = route('admin.submenu.delete', ["id" => $encryptid]);
                $action = '';
                if(Auth::user()->can(['submenu-edit']) && Auth::user()->can(['submenu-delete']))
                {
                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.submenu.editmenu', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';

                    $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"><i class="fa fa-trash"></i>&nbsp;</a></div>';
                }elseif (Auth::user()->can(['submenu-edit'])) {
                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.submenu.editmenu', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . '</div>';
                }elseif (Auth::user()->can(['submenu-delete'])) {
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

     public function menuByPage($city_id){
          $areas = Menu::select('name','id')->where('page_id',$city_id)->get();
          return response()->json($areas);
        }


}
