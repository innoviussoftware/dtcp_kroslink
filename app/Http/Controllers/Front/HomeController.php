<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages;
use App\Menu;
use App\Submenu;
use App\Slider;
use App\SliderImages;
use App\Clientlogo;
use App\Gallery;
use App\Settings;
use App\News;
use App\Whatsnew;
use App\ContactUs;
use App\GalleryImages;
use App\Category;
use Validator;
use Session;
use App\Visitors;
use App\Mail\RequestForm;
use Mail;

class HomeController extends Controller
{
    public function homeindex($page_name,Request $request)
    {
     
        $data = $request->session()->all();
        $rp=$request->ip();

        $visit=new Visitors;
        $visit->ip=$rp;
        $visit->save();
        if(isset($data['newlang']))
        {
          if($data['newlang'] =='en')
          {
                $name=trim(strtolower($page_name));
            
                $pages = Pages::where('alias',$page_name)->where('status',1)->first();

                
                if(isset($pages))
                {
                    $name=trim(strtolower($page_name));

                    if($name=='home')
                    {
                        $Slider=Slider::where('page_id',$pages->id)->with('slider_images')->get();
                        $response=[];
                        foreach ($Slider as  $value) {
                            $slider = SliderImages::where('slider_id',$value->id)->get();
                            foreach ($slider as $value) {
                                    $response[] = [
                                    "id" => $value->slider_id,
                                    "images" => $value->images,
                                  ];
                            }
                        }
                        $Clientlogo=Clientlogo::where('activate',1)->get();
                        $Gallery=Gallery::where('activate',1)->whereHas('category',function($q){
                                    $q->where('activate','1');
                        })->orderBy('id','desc')->groupBy('category_id')->get();
                        
                        $galleryres=[];
                        foreach ($Gallery as  $value) {
                            
                            $GalleryImages = GalleryImages::where('gallery_id',$value->id)->get();
                            foreach ($GalleryImages as $values) {
                                    $galleryres[] = [
                                    "id" => $values->gallery_id,
                                    "images" => $values->images,
                                    "category_name"=>isset($value->category->name)?$value->category->name:'',
                                    "description"=>$value->description
                                  ];
                            }
                        }
                        $Settings=Settings::first();
                        $news=News::where('status',1)->orderBy('id','desc')->get();
                        $wpimportant=Whatsnew::where('flag',2)->get();
                        $wpnew=Whatsnew::all();
                        $data=$this->homepage();
                        
                        return view('front.home',['response'=>$response,'Clientlogo'=>$Clientlogo,'Gallery'=>$Gallery,'Settings'=>$Settings,'news'=>$news,'data'=>$data,'wpimportant'=>$wpimportant,'wpnew'=>$wpnew,'pages'=>$pages,'galleryres'=>$galleryres]);
                    }
                    else
                    {
                        $data=$this->homepage();
                        $breadcumb=array();
                        $menu=Menu::where('page_id',$pages->id)->first();
                        $submenu=Submenu::where('page_id',$pages->id)->first();
                        if($menu)
                        {
                            $breadcumb[]=$menu->name;
                        }
                        else
                        {
                            $submenu=Submenu::where('page_id',$pages->id)->first();
                            if($submenu)
                            {
                                $menu=Menu::where('page_id',$submenu->menu_id)->first();
                                $breadcumb[]=$menu->name;
                                $breadcumb[]=$submenu->name;    
                            }
                        }
                        return view('front.pages',['pages'=> $pages,'data'=>$data,'menu'=>$menu,'submenu'=>$submenu,'breadcumb'=>$breadcumb]); 
                    }
                }
                else
                {
                        $data=$this->homepage();
                        return view('front.404',['data'=>$data]);
                }
          }
          else if($data['newlang'] =='tr')
          {
                $name=trim(strtolower($page_name));
            
                $pages = Pages::where('alias',$page_name)->where('status',1)->first();

                
                if(isset($pages))
                {
                    $name=trim(strtolower($page_name));

                    if($name=='home')
                    {
                        $Slider=Slider::where('page_id',$pages->id)->with('slider_images')->get();
                        $response=[];
                        foreach ($Slider as  $value) {
                            $slider = SliderImages::where('slider_id',$value->id)->get();
                            foreach ($slider as $value) {
                                    $response[] = [
                                    "id" => $value->slider_id,
                                    "images" => $value->images,
                                  ];
                            }
                        }
                        $Clientlogo=Clientlogo::where('activate',1)->get();
                        $Gallery=Gallery::where('activate',1)->whereHas('category',function($q){
                                $q->where('activate','1');
                        })->orderBy('id','desc')->groupBy('category_id')->get();
                        $galleryres=[];
                        
                        foreach ($Gallery as  $value) {
                            
                            $GalleryImages = GalleryImages::where('gallery_id',$value->id)->get();
                            foreach ($GalleryImages as $values) {
                                    $galleryres[] = [
                                    "id" => $values->gallery_id,
                                    "images" => $values->images,
                                    "category_name"=>isset($value->category->name)?$value->category->name:'',
                                    "description"=>$value->description
                                  ];
                            }
                        }
                        $Settings=Settings::first();
                        $news=News::where('status',1)->orderBy('id','desc')->get();
                        $wpimportant=Whatsnew::where('flag',2)->get();
                        $wpnew=Whatsnew::all();
                        $data=$this->homepage();
                        
                        return view('front.tamil.home',['response'=>$response,'Clientlogo'=>$Clientlogo,'Gallery'=>$Gallery,'Settings'=>$Settings,'news'=>$news,'data'=>$data,'wpimportant'=>$wpimportant,'wpnew'=>$wpnew,'pages'=>$pages,'galleryres'=>$galleryres]);
                    }
                    else
                    {
                        $data=$this->homepage();
                        $breadcumb=array();
                        $menu=Menu::where('page_id',$pages->id)->first();
                        $submenu=Submenu::where('page_id',$pages->id)->first();
                        if($menu)
                        {
                            $breadcumb[]=isset($menu->tamilname)?$menu->tamilname:$menu->name;
                        }
                        else
                        {
                            $submenu=Submenu::where('page_id',$pages->id)->first();

                            if($submenu)
                            {
                                $menu=Menu::where('page_id',$submenu->menu_id)->first();

                                $breadcumb[]=isset($menu->tamilname)?$menu->tamilname:$menu->name;
                                $breadcumb[]=isset($submenu->tamil_name)?$submenu->tamil_name:$submenu->name;   

                            }
                        }
                        return view('front.tamil.pages',['pages'=> $pages,'data'=>$data,'menu'=>$menu,'submenu'=>$submenu,'breadcumb'=>$breadcumb]); 
                    }
                }
                else
                {
                        $data=$this->homepage();
                        return view('front.404',['data'=>$data]);
                }
            } 
    }
     $name=trim(strtolower($page_name));
        
        $pages = Pages::where('alias',$page_name)->where('status',1)->first();

        
        if(isset($pages))
        {
            $name=trim(strtolower($page_name));

            if($name=='home')
            {
                $Slider=Slider::where('page_id',$pages->id)->with('slider_images')->get();
                $response=[];
                foreach ($Slider as  $value) {
                    $slider = SliderImages::where('slider_id',$value->id)->get();
                    foreach ($slider as $value) {
                            $response[] = [
                            "id" => $value->slider_id,
                            "images" => $value->images,
                          ];
                    }
                }
                $Clientlogo=Clientlogo::where('activate',1)->get();
                $Gallery=Gallery::where('activate',1)->whereHas('category',function($q){
                            $q->where('activate','1');

                        })->orderBy('id','desc')->groupBy('category_id')->get();

                $galleryres=[];
                        foreach ($Gallery as  $value) {
                            
                            $GalleryImages = GalleryImages::where('gallery_id',$value->id)->get();
                            foreach ($GalleryImages as $values) {
                                    $galleryres[] = [
                                    "id" => $values->gallery_id,
                                    "images" => $values->images,
                                    "category_name"=>isset($value->category->name)?$value->category->name:'',
                                    "description"=>$value->description,
                                    "primary_images"=>isset($value->category->image)?$value->category->image:''
                                  ];
                            }
                        }
                        
                $Settings=Settings::first();
                $news=News::where('status',1)->orderBy('id','desc')->get();
                $wpimportant=Whatsnew::where('flag',2)->get();
                $wpnew=Whatsnew::all();
                $data=$this->homepage();
                
                return view('front.home',['response'=>$response,'Clientlogo'=>$Clientlogo,'Gallery'=>$Gallery,'Settings'=>$Settings,'news'=>$news,'data'=>$data,'wpimportant'=>$wpimportant,'wpnew'=>$wpnew,'pages'=>$pages,'galleryres'=>$galleryres]);
            }
            else
            {
                $data=$this->homepage();
                $breadcumb=array();
                $menu=Menu::where('page_id',$pages->id)->first();
                $submenu=Submenu::where('page_id',$pages->id)->first();
                if($menu)
                {
                    $breadcumb[]=$menu->name;
                }
                else
                {
                    $submenu=Submenu::where('page_id',$pages->id)->first();
                    if($submenu)
                    {
                        $menu=Menu::where('page_id',$submenu->menu_id)->first();
                        $breadcumb[]=$menu->name;
                        $breadcumb[]=$submenu->name;    
                    }
                }
                return view('front.pages',['pages'=> $pages,'data'=>$data,'menu'=>$menu,'submenu'=>$submenu,'breadcumb'=>$breadcumb]); 
            }
        }
        else
        {
                $data=$this->homepage();
                return view('front.404',['data'=>$data]);
        }
    }


    //Screen Reader

    public function screenreader()
    {
        $data=$this->homepage();
        return view('front.screenreader',['data'=>$data]);
    }

    public function categorywisegallery()
    {
        $data=$this->homepage();
        $Gallery=Gallery::where('activate',1)->whereHas('category',function($q){
            $q->where('activate','1');
        })->groupBy('category_id')->get();

        $galleryres=[];
        foreach ($Gallery as  $value) {
                            
                        $GalleryImages = GalleryImages::where('gallery_id',$value->id)->get();
                            foreach ($GalleryImages as $values) {
                                    $galleryres[] = [
                                    "id" => $values->gallery_id,
                                    "images" => $values->images,
                                    "category_name"=>isset($value->category->name)?$value->category->name:'',
                                    "description"=>$value->description,
                                    "primary_images"=>isset($value->category->image)?$value->category->image:''
                                  ];
                            }
                          
        }

        return view('front.gallery',['Gallery'=>$Gallery,'galleryres'=>$galleryres,'data'=>$data]);
    }

    public function images($id)
    {
        $data=$this->homepage();
        $category=Category::where('activate',1)->get();
        $Gallery=Gallery::where('category_id',$id)->where('activate',1)->with('category')->get();

        $galleryres=[];
        foreach ($Gallery as $key => $value) {

            $GalleryImages = GalleryImages::where('gallery_id',$value->id)->get();
                            foreach ($GalleryImages as $values) {
                                    $galleryres[] = [
                                    "id" => $values->gallery_id,
                                    "images" => $values->images,
                                    "category_name"=>isset($value->category->name)?$value->category->name:'',
                                    "description"=>$value->description,
                                    "primary_images"=>isset($value->category->image)?$value->category->image:''
                                  ];
                            }
                              $galleryres[]=['images'=>$value->image,'description'=>$value->description];
        }

        $GalleryImages = GalleryImages::where('gallery_id',$id)->get();
        return view('front.gallery',['Gallery'=>$Gallery,'GalleryImages'=>$GalleryImages,'data'=>$data,'galleryres'=>$galleryres,'category'=>$category,'id'=>$id]);

    }

    //Header and footer functions
    public function homepage()
    {
                $Menu = Menu::with('pages')->orderBy('menus.sorted','ASC')->get()->toArray();
		$Visitors=Visitors::count();
                $menulist = array();
                $value['submenu'] = array();
                $value['is_submenu'] = 0;
                foreach ($Menu as $key => $value) {
                    $sub = Submenu::where('menu_id',$value['id'])->with('pages')->orderBy('submenus.sorted','asc')->get()->toArray();

                    if(!empty($sub)){
                        $value['submenu'] = $sub;
                        $value['is_submenu'] = 1;
                    }
                    $menulist[] = $value;
                }
                $Settings=Settings::first();
                $data=[
                        'facebook' =>isset($Settings->facebook)?$Settings->facebook:'',
                        'twitter' =>isset($Settings->twitter)?$Settings->twitter:'',
                        'linkedin' =>isset($Settings->linkedin)?$Settings->linkedin:'',
                        'pinterest' =>isset($Settings->pinterest)?$Settings->pinterest:'',
                        'google_plus' =>isset($Settings->google_plus)?$Settings->google_plus:'',
                        'youtube' =>isset($Settings->youtube)?$Settings->youtube:'',
                        'address' => isset($Settings->address)?$Settings->address:'',
                        'contact_number' =>isset($Settings->contact_number)? $Settings->contact_number:'',
                        'email_id'=>isset($Settings->email_id)? $Settings->email_id:'',
                        'copyright'=>isset($Settings->copyright)? $Settings->copyright:'',
                        'primary_logo'=>isset($Settings->primary_logo)? $Settings->primary_logo:'',
                        'secondary_logo'=>isset($Settings->secondary_logo)? $Settings->secondary_logo:'',
                        'favicon'=>isset($Settings->favicon)? $Settings->favicon:'',
                        'title'=>isset($Settings->title)? $Settings->title:'',
                        'description'=>isset($Settings->description)? $Settings->description:'',
                        'fax'=>isset($Settings->fax)? $Settings->fax:'',
                        'menulist'=>$menulist,
                        'tamil_title'=>isset($Settings->tamil_title)? $Settings->tamil_title:'',
                        'tamil_content'=>isset($Settings->tamil_content)? $Settings->tamil_content:'',
                        'tamil_address'=>isset($Settings->tamil_address)? $Settings->tamil_address:'',
                        'details'=>isset($Settings->details)? $Settings->details:'',
                        'tamil_details'=>isset($Settings->tamil_details)? $Settings->tamil_details:'',
                        'footerdetails'=>isset($Settings->footer_details)? $Settings->footer_details:'',
                        'footertamil_details'=>isset($Settings->footer_tamildetails)? $Settings->footer_tamildetails:'',
			'Visitors'=>isset($Visitors)?$Visitors:'',
                ];
                return $data;
    }

    //QUick Form

    public function myformPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
           // 'name' => 'required',
           // 'phone' => 'required',
           // 'email' => 'required|email',
           // 'subject' => 'required',
          //  'message' => 'required',
            'captchavalue'=>'captcha',
        ],[   
            
            //'captchavalue.required'=>'Please enter Captcha.',
            'captchavalue.captcha'=>'Incorrect Captcha.Try again'
        ]);

        if ($validator->passes()) {

            $contactus= new ContactUs;
            $contactus->name    = request('name');
            $contactus->email   = request('email');
            $contactus->phone   = request('phone');
            $contactus->subject = request('subject');
            $contactus->message = request('message');
            $contactus->save();

            $to_address='shahidpatel.innovius@gmail.com';
            $data=array(
                'name'=>request('name'),
                'email'=>request('email'),
                'phone'=>request('phone'),
                'subject'=>request('subject'),
                'message'=>request('message'),
            );
           // Mail::to($to_address)->send(new RequestForm($data));

            Mail::send('mail-template', ['user' => $data], function ($m) use($data) {

                 $m->from(env('SUPPORT_EMAIL'), 'DTCP | You have new inquiry');
                 $m->to('shahidpatel.innovius@gmail.com')->cc('harshal@innoviussoftware.com')->subject('DTCP | You have new inquiry');
            });
            if (Mail::failures()) {
           // return response()->json(['success'=>'Your request has been canc.']);
            }
            else
            {
               return response()->json(['success'=>'Your request has been submitted.']);

            }

           
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

   

    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

   

    public function session(Request $request)
    {
      $data = $request->session()->all();
      // Session::forget($data['newlang']);
      $request->session()->forget('newlang');
// dd($data['newlang']);
       $dd=Session::put('newlang', $request->input('lang') ); 
    }

    public function defaultfhomepage()
    {
         $name=trim(strtolower($page_name));
        
        $pages = Pages::where('alias',$page_name)->where('status',1)->first();

        
        if(isset($pages))
        {
            $name=trim(strtolower($page_name));

            if($name=='home')
            {
                $Slider=Slider::where('page_id',$pages->id)->with('slider_images')->get();
                $response=[];
                foreach ($Slider as  $value) {
                    $slider = SliderImages::where('slider_id',$value->id)->get();
                    foreach ($slider as $value) {
                            $response[] = [
                            "id" => $value->slider_id,
                            "images" => $value->images,
                          ];
                    }
                }
                $Clientlogo=Clientlogo::where('activate',1)->get();
                $Gallery=Gallery::where('activate',1)->get();
                $Settings=Settings::first();
                $news=News::where('status',1)->orderBy('id','desc')->get();
                $wpimportant=Whatsnew::where('flag',2)->get();
                $wpnew=Whatsnew::all();
                $data=$this->homepage();
                
                return view('front.home',['response'=>$response,'Clientlogo'=>$Clientlogo,'Gallery'=>$Gallery,'Settings'=>$Settings,'news'=>$news,'data'=>$data,'wpimportant'=>$wpimportant,'wpnew'=>$wpnew,'pages'=>$pages]);
            }
            else
            {
                $data=$this->homepage();
                $breadcumb=array();
                $menu=Menu::where('page_id',$pages->id)->first();
                $submenu=Submenu::where('page_id',$pages->id)->first();
                if($menu)
                {
                    $breadcumb[]=$menu->name;
                }
                else
                {
                    $submenu=Submenu::where('page_id',$pages->id)->first();
                    if($submenu)
                    {
                        $menu=Menu::where('page_id',$submenu->menu_id)->first();
                        $breadcumb[]=$menu->name;
                        $breadcumb[]=$submenu->name;    
                    }
                }
                return view('front.pages',['pages'=> $pages,'data'=>$data,'menu'=>$menu,'submenu'=>$submenu,'breadcumb'=>$breadcumb]); 
            }
        }
        else
        {
                $data=$this->homepage();
                return view('front.404',['data'=>$data]);
        }
    }

    public function gallery()
    {
        $Settings=Settings::first();
                $data=[
                        'facebook' =>isset($Settings->facebook)?$Settings->facebook:'',
                        'twitter' =>isset($Settings->twitter)?$Settings->twitter:'',
                        'linkedin' =>isset($Settings->linkedin)?$Settings->linkedin:'',
                        'pinterest' =>isset($Settings->pinterest)?$Settings->pinterest:'',
                        'google_plus' =>isset($Settings->google_plus)?$Settings->google_plus:'',
                        'youtube' =>isset($Settings->youtube)?$Settings->youtube:'',
                        'address' => isset($Settings->address)?$Settings->address:'',
                        'contact_number' =>isset($Settings->contact_number)? $Settings->contact_number:'',
                        'email_id'=>isset($Settings->email_id)? $Settings->email_id:'',
                        'copyright'=>isset($Settings->copyright)? $Settings->copyright:'',
                        'primary_logo'=>isset($Settings->primary_logo)? $Settings->primary_logo:'',
                        'secondary_logo'=>isset($Settings->secondary_logo)? $Settings->secondary_logo:'',
                        'favicon'=>isset($Settings->favicon)? $Settings->favicon:'',
                        'title'=>isset($Settings->title)? $Settings->title:'',
                        'description'=>isset($Settings->description)? $Settings->description:'',
                        'fax'=>isset($Settings->fax)? $Settings->fax:'',
                        'menulist'=>array(),
                        'tamil_title'=>isset($Settings->tamil_title)? $Settings->tamil_title:'',
                        'tamil_content'=>isset($Settings->tamil_content)? $Settings->tamil_content:'',
                        'tamil_address'=>isset($Settings->tamil_address)? $Settings->tamil_address:'',
                        'details'=>isset($Settings->details)? $Settings->details:'',
                        'tamil_details'=>isset($Settings->tamil_details)? $Settings->tamil_details:'',
                        'footerdetails'=>isset($Settings->footer_details)? $Settings->footer_details:'',
                        'footertamil_details'=>isset($Settings->footer_tamildetails)? $Settings->footer_tamildetails:'',
                ];
        return view('front.gallery',['data' => $data]);
        # code...
    }


}
