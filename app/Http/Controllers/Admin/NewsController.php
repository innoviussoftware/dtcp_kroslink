<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\Helpers\logs\LogsDetails;
class NewsController extends Controller
{
    public function index(Request $request)
    {
    	return view('admin.news.index');
    }

    public function addnews(Request $request)
    {
    	return view('admin.news.add');
    }

    public function storenews(Request $request)
    {
    	$this->validate($request, [
          'name' => 'required',
          'content' => 'required',
      	]);

        $news = new News;
        $news->title = request('name');
        $news->description = request('content');
        $news->tamil_title = request('tamilname');
        $news->tamil_content = request('tamilcontent');
        $news->url = request('url');
        $news->save();

        return redirect()->route('admin.news')->with("success","News added successfully.");
    }

    public function editnews($id)
    {
        $encryid = Crypt::decryptString($id);
    	$news=News::find($encryid);
    	if($news)
    	{
          return view('admin.news.edit',["news" => $news]);
        }
        else
        {
          return view('admin.errors.404');
        }
    }

    public function updatenews(Request $request,$id)
    {
    	$this->validate($request, [
          'name' => 'required',
          'content' => 'required',
      	]);

      	$news=News::find($id);

    	if($news)
    	{
            $news->title = request('name');
          	$news->description = request('content');
            $news->tamil_title = request('tamilname');
            $news->tamil_content = request('tamilcontent');
            $news->url = request('url');
          	$news->save();
            LogsDetails::StoreLogs('news', $request->all());
        }

        return redirect()->route('admin.news')->with('success','News updated successfully.');
    }

    public function deletenews($id)
    {
        $encryid = Crypt::decryptString($id);
    	$news = News::find($encryid);

        if($news){
          $news->delete();
        }

        return redirect()->route('admin.news')->with('success','News deleted successfully.');
    }

    public function arrayNews()
    {
    		$response = [];

            $news = News::all();

            foreach ($news as $n) {
                $sub   = [];

                $id    = $n->id;

                $sub[] = $id;

                $sub[] = $n->title;

                $sub[] = $n->url;

                $sub[] = substr($n->description,0,80);

                $encryptid = Crypt::encryptString($id);
                
                if(Auth::user()->can(['news-active'])){
                    if($n->status==1)
                    {
                        $verified_url = route('admin.news.changestatus',["id" => $encryptid,"status"=>0]);
                        $sub[] = '<a data-toggle="tooltip" title="click here to inactive" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactivate this news ?`)"  href="#"><label class="label label-success">Active</label></a>' . ' ';
                    }
                    elseif($n->status==0)
                    {
                        $verified_url = route('admin.news.changestatus',["id" =>$encryptid,"status"=>1]);
                        
                        $sub[] = '<a data-toggle="tooltip" title="click here to active" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to activate this news ?`)"  href="#"><label class="label label-danger">In-Active</label></a>' . ' ';
                    }

                }
                else{
                    if($n->status==1)
                    {
                        
                        $sub[] = '<label class="label label-success">Active</label>';
                    }
                    elseif($n->status==0)
                    {
                        
                        $sub[] = '<label class="label label-danger">In-Active</label>';
                    }
                }
                
                $delete_url = route('admin.news.delete', ["id" => $encryptid]);
                $action = '';
                if(Auth::user()->can(['news-edit']) && Auth::user()->can(['news-delete'])){
                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.news.editnews', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . ' ';

                    $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"  ><i class="fa fa-trash"></i>&nbsp;</a></div>';
                }elseif (Auth::user()->can(['news-edit'])) {
                    $action = '<div class="btn-part"><a class="edit" href="' . route('admin.news.editnews', $encryptid) . '"><i class="fa fa-pencil-square-o"></i></a>' . '</div>';
                }elseif (Auth::user()->can(['news-delete'])) {
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

    public function changestatus($id,$status)
    {
        $encryid = Crypt::decryptString($id);

        $update_attributes = array('activate' => $status);        

        $user = News::where('id',$encryid)->update(['status'=>$status]);
            
        if ($status == 1) {
                $msg = 'News is activated.';
        } elseif ($status == 0) {
                $msg = 'News is not activated.';
        }

        return redirect()->route('admin.news')->with('success', $msg);
    }
}
