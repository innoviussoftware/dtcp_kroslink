<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Support\Facades\Crypt;
class SettingsController extends Controller
{
    
    public function index(Request $request)
    {
    	return view('admin.settings.index');
    }

    public function addsetting(Request $request)
    {
        $settings=Settings::first();
        if($settings != null)
        {
            return view('admin.settings.edit',["settings" => $settings]);
        }
        else
        {
            return view('admin.settings.add');
        }
    	
    }

    public function storesetting(Request $request)
    {
    	// $this->validate($request, [
     //      'address' => 'required',
     //      'number' => 'required|numeric',
     //      'email_address'=>'required|email'
     //  	]);
        if ($request->file('primarylogo')) {
            $image = $request->primarylogo;
            $primarypath = $image->store('primarylogo');
        }

        if ($request->file('secondarylogo')) {
            $image = $request->secondarylogo;
            $secondarypath = $image->store('secondarylogo');
        }

        if ($request->file('favicon')) {
            $image = $request->favicon;
            $favpath = $image->store('favicon');
        }

        $Settings = new Settings;
        $Settings->title = request('title');
        $Settings->description = request('description');
        $Settings->address = request('address');
        $Settings->tamil_title = request('tamiltitle');
        $Settings->tamil_content = request('tamildescription');
        $Settings->tamil_address = request('tamiladdress');
        $Settings->contact_number = request('number');
        $Settings->fax = request('fax');
        $Settings->email_id = request('email_address');
        $Settings->copyright = request('copyright');
        $Settings->primary_logo = isset($primarypath)?$primarypath:'';
        $Settings->secondary_logo =isset($secondarypath)?$secondarypath:'';
        $Settings->favicon = isset($favpath)?$favpath:'';
        $Settings->facebook = request('facebook_url');
        $Settings->twitter = request('twitter_url');
        $Settings->linkedin = request('linkedin_url');
        $Settings->pinterest = request('pinterest_url');
        $Settings->google_plus = request('googleplus_url');
        $Settings->youtube = request('youtube_url');
        $Settings->details = request('engdetails');
        $Settings->tamil_details = request('tamildetails');
        $Settings->save();

        return back()->with('success','Settings added successfully.');

        //return redirect()->route('admin.setting')->with("success","Settings added successfully.");
    }

    public function editsetting($id)
    {
         // $encryid = Crypt::decryptString($id);
    	$settings=Settings::find($id);
    	if($settings)
    	{
          return view('admin.settings.edit',["settings" => $settings]);
        }
        else
        {
          return view('admin.errors.404');
        }
    }

    public function updatesetting(Request $request,$id)
    {
    	// $this->validate($request, [
     //      'address' => 'required',
     //      'number' => 'required|numeric',
     //      'email_address'=>'required|email'
     //  	]);

      	$Settings=Settings::find($id);

    	if($Settings)
    	{  
            if ($request->file('primarylogo')) {
                $image = $request->primarylogo;
                $primarypath = $image->store('primarylogo');
            }
            else
            {
                $primarypath = $request->primarylogo;
            }

            if ($request->file('secondarylogo')) {
                $image = $request->secondarylogo;
                $secondarypath = $image->store('secondarylogo');
            }
            else
            {
                $secondarypath = $request->secondarylogo;
            }

            if ($request->file('favicon')) {
                $image = $request->favicon;
                $favpath = $image->store('favicon');
            }
            else
            {   
                $favpath = $request->favicon;
            }
            $Settings->title = request('title');
            $Settings->description = request('description');
            $Settings->address = request('address');
            $Settings->tamil_title = request('tamiltitle');
            $Settings->tamil_content = request('tamildescription');
            $Settings->tamil_address = request('tamiladdress');
            $Settings->contact_number = request('number');
            $Settings->fax = request('fax');
            $Settings->email_id = request('email_address');
            $Settings->copyright = request('copyright');
            $Settings->primary_logo = isset($primarypath)?$primarypath:'';
            $Settings->secondary_logo = isset($secondarypath)?$secondarypath:'';
            $Settings->favicon = isset($favpath)?$favpath:'';
            $Settings->facebook = request('facebook_url');
            $Settings->twitter = request('twitter_url');
            $Settings->linkedin = request('linkedin_url');
            $Settings->pinterest = request('pinterest_url');
            $Settings->google_plus = request('googleplus_url');
            $Settings->youtube = request('youtube_url');
            $Settings->details = request('engdetails');
            $Settings->tamil_details = request('tamildetails');
            $Settings->footer_details = request('engfooterdetails');
            $Settings->footer_tamildetails = request('tamilfooterdetails');
        	$Settings->save();
        }

        return back()->with('success','Settings updated successfully.');
        //return redirect()->route('admin.setting')->with('success','Settings updated successfully.');
    }

    public function deletesetting($id)
    {
        //$encryid = Crypt::decryptString($id);
    	$settings = Settings::find($id);

        if($settings){
          $settings->delete();
        }

        return redirect()->route('admin.setting')->with('success','Settings deleted successfully.');
    }

    public function arraysetting()
    {
    		$response = [];

            $settings = Settings::all();

            foreach ($settings as $s) {
                $sub   = [];

                $id    = $s->id;

                $sub[] = $id;

                $sub[] = $s->address;

                $sub[] = $s->number;

                $sub[] = $s->fax;

                $sub[] = $s->email_id;

                $sub[] = isset($s->twitter)?$s->twitter:'-';

                $sub[] = isset($s->facebook)?$s->facebook:'-';

                $sub[] = isset($s->instragram)?$s->instragram:'-';

                $sub[] = isset($s->linkedin)?$s->linkedin:'-';

               // $encryid = Crypt::decryptString($id);

                $delete_url = route('admin.setting.delete', ["id" => $id]);

                $action = '<div class="btn-part"><a class="edit" href="' . route('admin.setting.editsetting', $id) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';

                $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"  ><i class="fa fa-trash"></i>&nbsp;</a></div>';

                $sub[] = $action;

                $response[] = $sub;
            }

            $userjson = json_encode(["data" => $response]);

            echo $userjson;
    }
}
