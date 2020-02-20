<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Pages;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\Helpers\logs\LogsDetails;
class MenuController extends Controller
{

    public function index()
    {
        return view('admin.menu.index');
    }

    public function addmenu()
    {
        $pages=Pages::where('status',1)->get();
        return view('admin.menu.add',['pages'=>$pages]);
    }

    public function storemenu(Request $request)
    {
        
        $this->validate($request, [
          'name' => 'required',
          'url' => 'required',
        ]);
        $page=Pages::where('id',request('page'))->first();
        $menu=Menu::where('page_id',request('page'))->first();
        $sorted=Menu::where('sorted',request('sort'))->first();
        if($menu)
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
                $Menu = new Menu;
                $Menu->name = request('name');
                $Menu->sorted = request('sort');
                $Menu->page_id = request('page');
                $Menu->url = $page->url;
                $Menu->tamilname = request('tamilname');
                $Menu->save();
                
                return redirect()->route('admin.menu')->with("success","Menu added successfully.");
            }
            
        }
        
    }

    public function editmenu($id)
    {
        $encryid = Crypt::decryptString($id);
        $menu=Menu::find($encryid);
        $pages=Pages::where('status',1)->get();
        if($menu)
        {
          return view('admin.menu.edit',["menu" => $menu,'pages'=>$pages]);
        }
        else
        {
          return view('admin.errors.404');
        }
    }

    public function updatemenu(Request $request,$id)
    {
        $this->validate($request, [
          'name' => 'required',
          'url' => 'required',
        ]);

        $menu=Menu::find($id);

        if($menu)
        {
            $page=Pages::where('id',request('page'))->first();
            if(request('page') == $menu->page_id)
            {
                $menu->page_id = request('page');
            }
            else
            {
                $menus=Menu::where('page_id',request('page'))->first();
                if($menus)
                {
                    return back()->with('success','Page is already assigned to other Menu.');
                }
                else
                {
                    $update=Menu::where('id',$id)->update(['page_id'=>request('page')]);
                }
            }
                        
            if(request('sort') == $menu->sorted )
            {
                $menu->sorted = request('sort');
            }
            else
            {
                $sorted=Menu::where('sorted',request('sort'))->first();

                if($sorted)
                {
                    return back()->with('success','Sort order is already assigned to other Menu.');
                }
                else
                {
                    $update=Menu::where('id',$id)->update(['sorted'=>request('sort')]);
                    
                }
            }
            
            
            $menu->name = request('name');
            $menu->sorted = request('sort');
            $menu->url = $page->url;
            $menu->tamilname = request('tamilname');
            $menu->save();
            // LogsDetails::StoreLogs('menu', $request->all());
            $page=Pages::where('id',$menu->page_id)->update(['alias'=>strtolower(request('name'))]);
        }

        return redirect()->route('admin.menu')->with('success','Menu updated successfully.');
    }

    public function deletemenu($id)
    {
        $encryid = Crypt::decryptString($id);
        $menu = Menu::find($encryid);

        if($menu){
          $menu->delete();
        }

        return redirect()->route('admin.menu')->with('success','Menu deleted successfully.');

    }

    public function arrayMenu(Request $request)
    {
            $response = [];

            $Menu = Menu::with('pages')->orderBy('menus.sorted')->get();

            foreach ($Menu as $m) {
                $sub = [];

                $id = $m->id;

                $sub[] = $id;

                $sub[] = $m->name;

                $sub[] = isset($m->pages->title)?$m->pages->title:'-';

                $sub[] = $m->url;

                $sub[] = $m->sorted;

                $encryptid = Crypt::encryptString($id);
                
                $delete_url = route('admin.menu.delete', ["id" => $encryptid]);
                
                $action = '';
                
                if(Auth::user()->can('menu-edit') && Auth::user()->can('menu-delete'))
                {
                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.menu.editmenu', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';

                    $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"  ><i class="fa fa-trash"></i>&nbsp;</a></div>';
                }elseif (Auth::user()->can('menu-edit')) {
                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.menu.editmenu', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . '</div>';
                }elseif (Auth::user()->can('menu-delete')) {
                    $action = '<div class="btn-part"><a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"  ><i class="fa fa-trash"></i>&nbsp;</a></div>';
                }else{
                    $action .='';
                }
                

                

                $sub[] = $action;

                $response[] = $sub;
            }

            $userjson = json_encode(["data" => $response]);

            echo $userjson;
    }

}
