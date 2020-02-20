@extends('front.tamil.dashboard')

@section('content')


<div class="slider-area clear">
    <div class="slider-wrapper hidden-xs hidden-sm">
        @foreach($response as $res)
        <div data-src="{{env('APP_URL_STORAGE').$res['images']}}">
            <div class="container ">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 hidden-xs hidden-sm">
                        
                    </div>
                    <!-- <div class="col-md-4 hidden-xs hidden-sm ">
                        <div class="camera_caption-right full-height  bg-blue  text-center">
                            <ul id="content-slider" class="content-slider owl-carousel-what-new">
                                <li>
                                <?php if(isset($wpnew)){
                                    $p = 1;
                                    foreach($wpnew as $wpnews){ 
                                    ?>
                                    <a href="<?php echo $wpnews->url;?>" class="{{ $p }}" target="_"><p><?php echo $wpnews->title;?> <sup><img src="{{asset('public/front_end/newimages/new.png')}}"></sup></p></a> 
                                <?php 
                                $p++;
                                if($p%4 == 0){ echo "</li><li>";  }
                            }

                            }?>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<?php
/* Batch 04-02-2020 */
$circleArr = array();
$urlArr = array(); 
if(isset($wpnew))
{
  $p = 1;
  foreach($wpnew as $wpnews)
  {
    $circleArr[$p]  = substr(isset($wpnews->tamil_title)?$wpnews->tamil_title:$wpnews->title, 0,25). '...';
    $urlArr[$p]   = $wpnews->url;
    $p++;
  }
}
?>

<!-- circles -->
<div class="circle-section">

<div class="row">
<div class="col-sm-4">
<!-- circle -->

<div class="circular-menu-container trans_posl" id="cog1">
  <ul class="circular-menu img">
    <li class="" tabindex="1">
      <div class="center-section section-1">
        <div class="animated fadeInUp">
          <h2></h2>
          
        </div>
      </div>
      
      <div class="bg"></div>
      <a href="<?php echo $urlArr[1]; ?>" target="_blank"><div class="label">
        <p><span class="estyle"><?php echo $circleArr[1]; ?></span> <span id="sp1">1</span></p>
      </div>
      </a>
    </li>
    <li class="" tabindex="2">
      <div class="center-section section-2">
        <div class="animated fadeInUp">
          <h2></h2>
        </div>
      </div>
     
      <div class="bg"></div>
      <a href="<?php echo $urlArr[2]; ?>" target="_blank"><div class="label">
        <p><span class="estyle"><?php echo $circleArr[2]; ?></span><span id="sp1">2</span></p>
      </div></a> 
    </li>
    <li class="" tabindex="3">
      <div class="center-section section-3">
        <div class="animated fadeInUp">
          <h2></h2>
          
        </div>
      </div>
   
      <div class="bg"></div>
      <a href="<?php echo $urlArr[3]; ?>" target="_blank"><div class="label">
        <p><span class="estyle"><?php echo $circleArr[3]; ?></span> <span id="sp2">3</span></p>
      </div>
      </a>
    </li>
    <li class="" tabindex="4">
      <div class="center-section section-4">
        <div class="animated fadeInUp">
          <h2></h2>
         
        </div>
      </div>
   
      <div class="bg"></div>
      <a href="<?php echo $urlArr[4]; ?>" target="_blank"><div class="label">
        <p><span class="estyle"><?php echo $circleArr[4]; ?></span><span id="sp4">4</span></p>
      </div>
      </a> 
    </li>
    <li class="" tabindex="5">
      <div class="center-section section-5">
        <div class="animated fadeInUp">
          <h2></h2>
          
        </div>
      </div>
    
      <div class="bg"></div>
      <a href="<?php echo $urlArr[5]; ?>" target="_blank"><div class="label">
        <p><span class="estyle"><?php echo $circleArr[5]; ?></span><span id="sp3">5</span></p>
      </div>
      </a> 
    </li>
    <li class="" tabindex="6">
      <div class="center-section section-6">
        <div class="animated fadeInUp">
          <h2></h2>
        </div>
      </div>
  
      <div class="bg"></div>
      <a href="<?php echo $urlArr[6]; ?>" target="_blank"><div class="label">
        <p><span class="estyle"><?php echo $circleArr[6]; ?></span><span id="sp6">6</span></p>
      </div>
      </a> 
    </li>
    <li class="" tabindex="7">
      <div class="center-section section-7">
        <div class="animated fadeInUp">
          <h2></h2>
          
        </div>
      </div>
      
      <div class="bg"></div>
      <a href="<?php echo $urlArr[7]; ?>" target="_blank"><div class="label">
        <p><span class="estyle"><?php echo $circleArr[7]; ?></span><span id="sp1">7</span></p>
      </div>
      </a>
    </li>
   
   
   
    
    <div class="center-section section-intro">
      <div class="animated fadeInUp">
        <h2></h2>
        <p></p>
      </div>
    </div>
  </ul>
  
<div id="img_section">
<img src="{{asset('public/front_end/newimages/innerimage1.png')}}" alt="images" style="width:50%" class="img">
</div>  
<div class="img_txt">
<span class="span_green">D</span>
<span class="span_green">T</span>
<span>C</span>
<span>P</span>    
</div>
  
</div>




<!-- circle -->
</div>

<div class="col-sm-4">

<div class="camera_caption-center text-center ">
                            <?php if(isset($wpimportant)){
                                foreach($wpimportant as $wps){?>
                                <div class="list">
                                    <a href="<?php echo $wps->url;?>" target="_"><p><?php echo isset($wps->tamil_title)?$wps->tamil_title:$wps->title;?> <span><img src="{{asset('public/front_end/newimages/Bulb.gif')}}" style="width: 25px;"></span></p></a> 
                                </div>
                            <?php }}?>
                        </div>

</div>
<div class="col-sm-4">
<!-- circle -->
<div class="circular-menu1-container1 trans_posr" id="cog1">
  <ul class="circular-menu1 img">
    
    <li class="" tabindex="1">
      <div class="center-section1 section-1">
        <div class="animated fadeInUp">
          <h2></h2>
          <a href="#"></a>
        </div>
      </div>
      <div class="bg"></div>
       <a href="http://www.tn.gov.in/tcp/authorities.htm" target="_blank" class="estyle"><div class="label">
        <p><div>8</div><span class="estyle">Activities</span></p>
      </div></a>
    </li>
    <li class="" tabindex="2">
      <div class="center-section1 section-2">
        <div class="animated fadeInUp">
          <h2></h2>
          <a href="#"></a>
        </div>
      </div>

      <div class="bg"></div>
     <a href="http://www.tn.gov.in/tcp/approvals.html" target="_blank" class="estyle"> <div class="label">
        <p><div>9</div> <span class="estyle">Approvals</span> </p>
      </div></a>
    </li>
    <li class="" tabindex="3">
      <div class="center-section1 section-3">
        <div class="animated fadeInUp">
          <h2></h2>
          <a href="#"></a>
        </div>
      </div>
      
      <div class="bg"></div>
      <a href="http://www.tn.gov.in/tcp/acts_rules.htm" target="_blank" class="estyle"><div class="label">
        <p><div>10</div> <span class="estyle">Act/Rules</span> </p>
      </div></a>
    </li>
    <li class="" tabindex="4">
      <div class="center-section1 section-4">
        <div class="animated fadeInUp">
          <h2></h2>
          <a href="#"></a>
        </div>
      </div>
 
      <div class="bg"></div>
     <a href="http://www.tn.gov.in/tcp/checklist.html" target="_blank" class="estyle"> <div class="label">
        <p><div>11</div> <span class="estyle">Checklist </span></p>
      </div>
      </a>
    </li>
    <li class="" tabindex="5">
      <div class="center-section1 section-5">
        <div class="animated fadeInUp">
          <h2></h2>
          <a href="#"></a>
        </div>
      </div>
     
      <div class="bg"></div>
      <a href="http://www.tn.gov.in/tcp/documents.htm" target="_blank" class="estyle"><div class="label">
        <p><div>12</div> <span class="estyle">Documents</span></p>
      </div></a>
    </li>
    <li class="" tabindex="6">
      <div class="center-section1 section-6">
        <div class="animated fadeInUp">
          <h2></h2>
          <a href="#"></a>
        </div>
      </div>

      <div class="bg"></div>
      <a href="http://www.tn.gov.in/tcp/eodb.html" target="_blank" class="estyle"><div class="label">
        <p><div>13</div> <span class="estyle">EODB</span></p>
      </div>
      </a>
    </li>
    <li class="" tabindex="7">
      <div class="center-section1 section-7">
        <div class="animated fadeInUp">
          <h2></h2>
          <a href="#"></a>
        </div>
      </div>

      <div class="bg"></div>
      <a href="http://www.tn.gov.in/tcp/forms.htm" target="_blank" class="estyle"><div class="label">
        <p><div>14</div> <span class="estyle">Forms</span></p>
      </div>
      </a>
    </li>
     <li class="" tabindex="8">
      <div class="center-section1 section-8">
        <div class="animated fadeInUp">
          <h2></h2>
          <a href="#"></a>
        </div>
      </div>
 
      <div class="bg"></div>
      <a href="http://www.tn.gov.in/tcp/useful_link.htm" target="_blank"><div class="label">
        <p><div>15</div> <span class="estyle">Useful links</span></p>
      </div>
      </a>
    </li>
  
    
    <li class="" tabindex="9">
      <div class="center-section1 section-9">
        <div class="animated fadeInUp">
          <h2></h2>
          <a href="#"></a>
        </div>
      </div>
 
      <div class="bg"></div>
      <a href="http://www.tn.gov.in/tcp/contactus.htm" target="_blank" class="estyle"><div class="label">
        <p><div id="rotate">16</div> <span class="estyle">Contact Us</span></p>
      </div></a>
    </li>
    
    
    <div class="center-section1 section-intro">
      <div class="animated fadeInUp">
        <h2></h2>
        <p></p>
      </div>
    </div>
  </ul>
  
<div id="img_section1">
<img src="{{asset('public/front_end/newimages/innerimage.png')}}" alt="images" style="width:50%" class="img">
</div>  

<div class="img_txt1">
<span class="span_green">D</span>
<span class="span_green">T</span>
<span>C</span>
<span>P</span>    
</div>


</div>
<!-- circle -->
</div>

</div>

</div>
<!-- circles -->

    <!-- Start whatnew Area -->
    <div class="latest-whatnew-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="what-new-content">
                        
                        <div class="content">
                          <div class="col-md-2 col-sm-3 col-xs-12">
                            <h3 class="title">What's New <span><img src="{{asset('public/front_end/newimages/12.png')}}" alt="What's New"></span></h3>
                            </div>
                            <div class="col-md-10 col-sm-9 col-xs-12">
                            <div class="list">
                                
                                <marquee direction="right" onmouseover="this.stop();" onmouseout="this.start();">
                                    @foreach($wpnew as $wps)
                                    <a href="{{$wps->url}}" target="_blank">{{($wps->tamil_title)?$wps->tamil_title:$wps->title}}</a>
                                    @endforeach
                                </marquee>
                               
                                <!-- <a href="#">online contribution to CMPRF</a>
                                <a href="#">NIC/GOV ID's of AD & Above DDA officers</a>
                                <a href="#">Circular based on the G.O No.21 Dt.05th February 2019</a> -->
                            </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <!-- End whatnew -->
    <!-- Start infobox Area -->
    <div class="latest-infobox-area section-pt-30-pb-15">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                        <div class="iconbtn">
                    <div class="info-box yellowbtn">
                            <span class="info-box-icon bg-aqua"><img src="{{asset('public/front_end/newimages/icon/1.png')}}">
                            </span>
                            <div class="info-box-content">
                              <a href="{{route('homeindex','actsrules')}}"><span class="info-box-text">சட்டத்தின் / விதிகள்</span></a>
                            </div>
                        </div>
                    </div>
                        <div class="iconbtn">
                    <div class="info-box greenbtn">
                            <span class="info-box-icon bg-aqua "><img src="{{asset('public/front_end/newimages/icon/2.png')}}"></span>
                            <div class="info-box-content">
                              <a href="{{route('homeindex','approvals')}}"><span class="info-box-text">ஒப்புதல்கள்</span></a>
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                        <div class="iconbtn">
                    <div class="info-box redbtn">
                            <span class="info-box-icon bg-aqua"><img src="{{asset('public/front_end/newimages/icon/3.png')}}"></span>
                            <div class="info-box-content">
                              <a href="{{route('homeindex','landusedetails')}}"><span class="info-box-text">நில பயன்பாட்டு விவரங்கள்</span></a>
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                        <div class="iconbtn">
                    <div class="info-box skybtn">
                            <span class="info-box-icon bg-aqua"><img src="{{asset('public/front_end/newimages/icon/4.png')}}"></span>
                            <div class="info-box-content">
                              <a href="https://dtcponline.tn.gov.in/public/" target="_blank"><span class="info-box-text">பொது பார்வை</span></a>
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                        <div class="iconbtn">
                    <div class="info-box brownbtn">
                            <span class="info-box-icon bg-aqua"><img src="{{asset('public/front_end/newimages/icon/5.png')}}"></span>
                            <div class="info-box-content">
                              <a href="https://dtcponline.tn.gov.in/dtcp4/" target="_blank"><span class="info-box-text">அதிகாரப்பூர்வ உள்நுழைவு</span></a>
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Latest Blog Area -->
    <!-- Start news Blog Area -->
    <div class="latest-news-area section-pt-15-pb-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="col-md-6 mb-5">
                    <div class="carousel-title">
                        <h2><span>நிறுவனங்கள், செயல்பாடுகள் மற்றும் கடமைகளின் விவரங்கள்</span></h2>
                    </div>
                    <div class="news-content">
                        <h5 class="theme-color"><span>அரசியலமைப்பு</span></h5>
                        <p>{{($Settings->tamil_details)?$Settings->tamil_details:$Settings->details}}</p>
                        <a href="{{route('homeindex','aboutus')}}"><button type="button" class="btn btn-primary">Read More</button></a>
                    </div>
                </div>
                <div class="col-md-6 latest-notice">
                    <div class="carousel-title">
                        <h2><span>சமீபத்திய செய்திகள் / அறிவிப்பு</span></h2>
                    </div>
                    <div class="notice-content">
                      <marquee direction = "down" height="300px" onmouseover="this.stop();" onmouseout="this.start();">
                        @foreach($news as $new)
                        <div class="news-notice-content">
                            <div class="auther-content d-inline-block">
                                <div class="date"><span><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp; {{date('M d, Y',strtotime($new->created_at))}}</span></div>
                                <div class="auther"><span><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp; By admin</span></div>
                            </div>
                            <p><a href="{{$new->url}}" target="_" class="newslink">{{($new->tamil_title)?$new->tamil_title:$new->title}}</a></p>
                        </div>
                        @endforeach
                        </marquee>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="latest-gallery-area section-p-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel-title">
                        <h2><span>Photo Gallery</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="gallery">
                        @foreach($Gallery as $key => $gal)
                        <div class="single-gallery">
                            <a href="{{env('APP_URL_STORAGE').$gal->image}}" data-lightbox="image-1" data-title="My caption"><img src="{{env('APP_URL_STORAGE').$gal->image}}" alt="gallery {{ $key }}" width="243px" height="243px"></a>
                            <div class="gallerytitle"><a href="{{route('gallerydetail',isset($gal->category->id)?$gal->category->id:'')}}">{{isset($gal->category->name)?$gal->category->name:''}}</a></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Latest Blog Area -->
    <!-- Start Our Brand Area -->
    <div class="our-brand-area section-p-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        @foreach($Clientlogo as $logo)
                        <div class="single-brand">
                            <a href="#"><img src="{{env('APP_URL_STORAGE').$logo->image}}" alt="Brand"></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection