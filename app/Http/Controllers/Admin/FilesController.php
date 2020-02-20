<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Whatsnew;
use App\File;
use Auth;

class FilesController extends Controller
{
    //

    public function index()
    {
    	return view('admin.files.index');
    }

     public function addfiles(Request $request)
    {
        return view('admin.files.add');
    }

    public function storefiles(Request $request)
    {
        $this->validate($request, [
          'title' => 'required',
        ]);
        // Flag 
        // 1-New 2-Important
        if ($request->file('document')) {
            $image = $request->document;
            $path = $image->store('document');
        }

        $fullpath=env('APP_URL_STORAGE').$path;
        $File = new File;
        $File->title = request('title');
        $File->file_link = isset($fullpath)?$fullpath:'';
        $File->save();

        return redirect()->route('admin.files')->with("success","File added successfully.");
    }

    public function editfiles($id)
    {
        $File=File::find($id);
        if($File)
        {
          return view('admin.files.edit',["File" => $File]);
        }
        else
        {
          return view('admin.errors.404');
        }
    }

    public function update(Request $request,$id)
    {
        // Flag 
        // 1-New 2-Important

        $this->validate($request, [
          'title' => 'required',
        ]);

        $File=File::find($id);

        if($File)
        {   
            $File->title = request('title');
        	$File->file_link = request('url');
            $File->save();
        }
            
        return redirect()->route('admin.files')->with('success','File updated successfully.');
    }

     public function delete($id)
    {
       // $encryid = Crypt::decryptString($id);
        $File = File::find($id);

        if($File){
          $File->delete();
        }

        return redirect()->route('admin.files')->with('success','File deleted successfully.');
    }

    public function arrayfiles()
    {
            $response = [];

            $events = File::all();

            foreach ($events as $e) {
                $sub   = [];

                $id    = $e->id;

                $sub[] = $id;

                $sub[] = $e->title;

                $sub[] = $e->file_link;

                // if($e->flag==1)
                // {
                //     $sub[] = '<label class="label label-success">New</label>';
                // }

                // if($e->flag==2)
                // {
                //     $sub[] = '<label class="label label-info">Important</label>';
                // }
                
                //$encryid = Crypt::decryptString($id);

                $delete_url = route('admin.files.delete', ["id" => $id]);

                // $action = '<div class="btn-part"><a class="edit" href="' . route('admin.whatsnew.editwhatsnew', $id) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';

                $action = '<div class="btn-part"><a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"><i class="fa fa-trash"></i>&nbsp;</a></div>';

                $sub[] = $action;

                $response[] = $sub;
            }

            $userjson = json_encode(["data" => $response]);

            echo $userjson;
    }

}
