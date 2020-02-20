<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Whatsnew;
use App\ContactUs;
use Auth;

class ContactController extends Controller
{
    // Flag 1-New 2-Important

    public function index()
    {
    	return view('admin.contact.index');
    }

    public function Arraycontacts()
    {
    	    $response = [];

            $Menu = ContactUs::all();

            foreach ($Menu as $m) {
                $sub = [];

                $id = $m->id;

                $sub[] = $id;

                $sub[] = $m->name;

                $sub[] = $m->email;

                $sub[] = $m->phone;

                $sub[] = $m->subject;

                $sub[] = $m->message;

                $response[] = $sub;
            }

            $userjson = json_encode(["data" => $response]);

            echo $userjson;
    }

    public function whatsnewindex(Request $request)
    {
        return view('admin.whatsnew.index');
    }

    public function addwhatsnew(Request $request)
    {
        $Whatsnew=Whatsnew::where('flag','=','2')->count();    
        
        return view('admin.whatsnew.add',['Whatsnew'=>$Whatsnew]);
    }

    public function storewhatsnew(Request $request)
    {
        $this->validate($request, [
          'title' => 'required',
          'url' => 'required',
        ]);
        // Flag 
        // 1-New 2-Important
        $Whatsnew = new Whatsnew;
        $Whatsnew->title = request('title');
        $Whatsnew->tamil_title = request('tamiltitle');
        $Whatsnew->flag=request('type');
        $Whatsnew->save();


        return redirect()->route('admin.whatsnew')->with("success","Whatsnew added successfully.");
    }

    public function editwhatsnew($id)
    {
        //$encryid = Crypt::decryptString($id);
        $count=Whatsnew::where('flag','=','2')->count(); 
        $Whatsnew=Whatsnew::find($id);
        if($Whatsnew)
        {
          return view('admin.whatsnew.edit',["Whatsnew" => $Whatsnew,'count'=>$count]);
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
          'url' => 'required',
        ]);

        $Whatsnew=Whatsnew::find($id);

        if($Whatsnew)
        {   
            $Whatsnew->title = request('title');
            $Whatsnew->tamil_title = request('tamiltitle');
            $Whatsnew->url = request('url');
            if($Whatsnew->flag == 2)
            {
               $Whatsnew->flag=request('type'); 
               $Whatsnew->save();
            }
            else
            {
                $count=Whatsnew::where('flag','=','2')->count();
                
                if(request('type')==2)
                {
                    if($count >= 3)
                    {
                        return back()->with('success','Sorry! you can not add more then 3 important message here');
                    }
                    else
                    {
                        $Whatsnew->flag=request('type'); 
                        $Whatsnew->save();
                    }
                }

                 if(request('type')==1)
                {
                    
                        $Whatsnew->flag=request('type'); 
                        $Whatsnew->save();
                    
                }


                
            }
        }
            
        return redirect()->route('admin.whatsnew')->with('success','Whatsnew updated successfully.');
    }

    public function delete($id)
    {
       // $encryid = Crypt::decryptString($id);
        $Whatsnew = Whatsnew::find($id);

        if($Whatsnew){
          $Whatsnew->delete();
        }

        return redirect()->route('admin.whatsnew')->with('success','Whatsnew deleted successfully.');
    }

    public function arraywhatsnew()
    {
            $response = [];

            $events = Whatsnew::all();

            foreach ($events as $e) {
                $sub   = [];

                $id    = $e->id;

                $sub[] = $id;

                $sub[] = $e->title;

                $sub[] = $e->url;

                if($e->flag==1)
                {
                    $sub[] = '<label class="label label-success">New</label>';
                }

                if($e->flag==2)
                {
                    $sub[] = '<label class="label label-info">Important</label>';
                }
                
                //$encryid = Crypt::decryptString($id);

                $delete_url = route('admin.whatsnew.delete', ["id" => $id]);

                if(Auth::user()->can(['whatsnew-edit']))
                {
                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.whatsnew.editwhatsnew', $id) . '"><i class="fa fa-pencil-square-o"></i></a>' . '</div>';
                }
                if(Auth::user()->can(['whatsnew-edit']) && Auth::user()->can(['whatsnew-delete']))
                {
                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.whatsnew.editwhatsnew', $id) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';

                    $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"><i class="fa fa-trash"></i>&nbsp;</a></div>';
                }
                else
                {
                    $action = '';
                }

                $sub[] = $action;

                $response[] = $sub;
            }

            $userjson = json_encode(["data" => $response]);

            echo $userjson;
    }

    public function changestatus($id,$status)
    {
        $update_attributes = array('activate' => $status);        

        $user = Events::where('id',$id)->update(['status'=>$status]);
            
        if ($status == 1) {
                $msg = 'Events is activated.';
        } elseif ($status == 0) {
                $msg = 'Events is not activated.';
        }

        return redirect()->route('admin.events')->with('success', $msg);
    }
}
