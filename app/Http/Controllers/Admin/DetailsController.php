<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Header;
use Illuminate\Support\Facades\Crypt;
class DetailsController extends Controller
{
    //
      public function index()
    {
    	return view('admin.header.index');
    }

    public function addheader()
    {
    	return view('admin.header.add');
    }

    public function storeheader(Request $request)
    {
    

      	$this->validate($request, [
          'PrimaryTitle' => 'required',
          'primarylogo' => 'required',
          'SecondaryTitle' => 'required',
      	]);

        $Header = new Header;
        if ($request->file('primarylogo')) {
            $primarylogo = $request->primarylogo;
            $pathprimarylogo = $primarylogo->store('primarylogo');
        }
        if ($request->file('secondarylogo')) {
            $secondarylogo = $request->secondarylogo;
            $pathsecondarylogo = $secondarylogo->store('secondarylogo');
        }
        $Header->primary_name = request('PrimaryTitle');
        $Header->secondary_name = request('SecondaryTitle');
        $Header->primary_logo = isset($pathprimarylogo)?$pathprimarylogo:'';
        $Header->secondary_logo = isset($pathsecondarylogo)?$pathsecondarylogo:'';
        $Header->save();

        return redirect()->route('admin.header')->with("success","Header added successfully.");
    }

    public function editheader($id)
    {
        $encryid = Crypt::decryptString($id);
    	$Header=Header::find($encryid);
    	if($Header)
    	{
          return view('admin.header.edit',["Header" => $Header]);
        }
        else
        {
          return view('admin.errors.404');
        }
    }

    public function updateheader(Request $request,$id)
    {
        
      	$Header=Header::find($id);

    	if($Header)
    	{
            if ($request->file('primarylogo')) {
	            $primarylogo = $request->primarylogo;
	            $primarylogopath = $primarylogo->store('primarylogo');
        	}
        	else
        	{
        		$primarylogopath=$request->primarylogopath;
        	}

            if ($request->file('secondarylogo')) {
                $secondarylogo = $request->secondarylogo;
                $secondarylogopath = $secondarylogo->store('secondarylogo');
            }
            else
            {
                $secondarylogopath=$request->secondarylogopath;
            }
        	$Header->primary_name = request('PrimaryTitle');
            $Header->secondary_name = request('SecondaryTitle');
            $Header->primary_logo = isset($primarylogopath)?$primarylogopath:$primarylogopath;
            $Header->secondary_logo = isset($$secondarylogopath)?$$secondarylogopath:$secondarylogopath;
          	$Header->save();
        }

        return redirect()->route('admin.header')->with('success','Header updated successfully.');
    }

    public function deleteheader($id)
    {

    	$Header = Header::find($id);

        if($Header){
          $Header->delete();
        }

        return redirect()->route('admin.header')->with('success','Header deleted successfully.');

    }

    public function arrayHeader(Request $request)
    {
    		$response = [];

            $Menu = Header::all();
            
            foreach ($Menu as $m) {
                $sub = [];

                $id = $m->id;

                $sub[] = $id;

                

                if($m->primary_logo)
                {
                	$sub[] = '<img src="'.env('APP_URL_STORAGE').''.$m->primary_logo.'" width="250" height="50">';	
                }
                $sub[] = $m->primary_name;
                $sub[] = $m->secondary_name;
                if($m->secondary_logo)
                {
                    $sub[] = '<img src="'.env('APP_URL_STORAGE').''.$m->secondary_logo.'" width="250" height="50">';  
                }

                

                $delete_url = route('admin.header.delete', ["id" => $id]);

                $action = '<div class="btn-part"><a class="edit" href="' . route('admin.header.editheader', $id) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';

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

        return redirect()->route('admin.header')->with('success', $msg);
    }
}
