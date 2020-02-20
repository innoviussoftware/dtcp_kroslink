<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events;
use Illuminate\Support\Facades\Crypt;
class EventsController extends Controller
{
    public function index(Request $request)
    {
    	return view('admin.events.index');
    }

    public function addevent(Request $request)
    {
    	return view('admin.events.add');
    }

    public function storeevent(Request $request)
    {
    	$this->validate($request, [
          'name' => 'required',
          'content' => 'required',
      	]);

        $events = new Events;
        $events->title = request('name');
        $events->description = request('content');
        $events->event_date=request('eventdate');
        $events->save();

        return redirect()->route('admin.events')->with("success","Events added successfully.");
    }

    public function editevent($id)
    {
    	$events=Events::find($id);
    	if($events)
    	{
          return view('admin.events.edit',["events" => $events]);
        }
        else
        {
          return view('admin.errors.404');
        }
    }

    public function updateevent(Request $request,$id)
    {
    	$this->validate($request, [
          'name' => 'required',
          'content' => 'required',
      	]);

      	$event=Events::find($id);

    	if($event)
    	{
            $event->title = request('name');
          	$event->description = request('content');
          	$event->event_date=request('eventdate');
          	$event->save();
        }

        return redirect()->route('admin.events')->with('success','Events updated successfully.');
    }

    public function deleteevent($id)
    {
    	$event = Events::find($id);

        if($event){
          $event->delete();
        }

        return redirect()->route('admin.events')->with('success','Events deleted successfully.');
    }

    public function arrayevent()
    {
    		$response = [];

            $events = Events::all();

            foreach ($events as $e) {
                $sub   = [];

                $id    = $e->id;

                $sub[] = $id;

                $sub[] = $e->title;

                $sub[] = $e->event_date;

                $sub[] = substr($e->description,0,80);

				if($e->status==1)
                {
                    $verified_url = route('admin.events.changestatus',["id" => $id,"status"=>0]);
                    $sub[] = '<a data-toggle="tooltip" title="click here to inactive" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactivate this event ?`)"  href="#"><label class="label label-success">Active</label></a>' . ' ';
                }
                elseif($e->status==0)
                {
                    $verified_url = route('admin.events.changestatus',["id" =>$id,"status"=>1]);
                    
                    $sub[] = '<a data-toggle="tooltip" title="click here to active" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to activate this event ?`)"  href="#"><label class="label label-danger">In-Active</label></a>' . ' ';
                }

                $delete_url = route('admin.events.delete', ["id" => $id]);

                $action = '<div class="btn-part"><a class="edit" href="' . route('admin.events.editevents', $id) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';

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

        $user = Events::where('id',$id)->update(['status'=>$status]);
            
        if ($status == 1) {
                $msg = 'Events is activated.';
        } elseif ($status == 0) {
                $msg = 'Events is not activated.';
        }

        return redirect()->route('admin.events')->with('success', $msg);
    }
}
