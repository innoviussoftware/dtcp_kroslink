@extends('front.dashboard')



@section('content')
<style type="text/css">
.latest-gallery-area .single-gallery .overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #008CBA;
}
.latest-gallery-area .single-gallery:hover .overlay {
  opacity: 1;
}
.categortytext {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
</style>




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

    $circleArr[$p]  = substr($wpnews->title, 0,25). '...';

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

          <!-- <h2></h2> -->

          

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

          <!-- <h2></h2> -->

        </div>

      </div>

     

      <div class="bg"></div>

      <a href="<?php echo $urlArr[2]; ?>" target="_blank"><div class="label">

        <p><span class="estyle"><?php echo $circleArr[2]; ?></span><span id="sp11">2</span></p>

      </div></a> 

    </li>

    <li class="" tabindex="3">

      <div class="center-section section-3">

        <div class="animated fadeInUp">

          <!-- <h2></h2> -->

          

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

          <!-- <h2></h2> -->

         

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

          <!-- <h2></h2> -->

          

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

          <!-- <h2></h2> -->

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

          <!-- <h2></h2> -->

          

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

        <!-- <h2></h2> -->

        <p></p>

      </div>

    </div>

  </ul>

  

<span id="img_section">

<img src="{{asset('public/front_end/newimages/innerimage1.png')}}" alt="images" style="width:50%" class="img">

</span>  

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

                                    <a href="<?php echo $wps->url;?>"><p><?php echo $wps->title;?> <span><img alt="Bulb" src="{{asset('public/front_end/newimages/Bulb.gif')}}" style="width: 25px;"></span></p></a> 

                                </div>

                            <?php }}?>

                        </div>



</div>

<div class="col-sm-4">

<!-- circle -->

<div class="circular-menu1-container1 trans_posr" id="cog2">

  <ul class="circular-menu1 img">

    

    <li class="" tabindex="1">

      <div class="center-section1 section-1">

        <div class="animated fadeInUp">

          <!-- <h2></h2> -->

          <!-- <a href="#"></a> -->

        </div>

      </div>

      <div class="bg"></div>

       <a href="http://kroslinks.in/DTCP/preparationofplans" target="_blank" class="estyle"><div class="label">

        <p><div>8</div><span class="estyle">Activities</span></p>

      </div></a>

    </li>

    <li class="" tabindex="2">

      <div class="center-section1 section-2">

        <div class="animated fadeInUp">

          <!-- <h2></h2> -->

          <!-- <a href="#"></a> -->

        </div>

      </div>



      <div class="bg"></div>

     <a href="http://kroslinks.in/DTCP/layout" target="_blank" class="estyle"> <div class="label">

        <p><div>9</div> <span class="estyle">Approvals</span> </p>

      </div></a>

    </li>

    <li class="" tabindex="3">

      <div class="center-section1 section-3">

        <div class="animated fadeInUp">

          <!-- <h2></h2> -->

          <!-- <a href="#"></a> -->

        </div>

      </div>

      

      <div class="bg"></div>

      <a href="http://kroslinks.in/DTCP/acts" target="_blank" class="estyle"><div class="label">

        <p><div>10</div> <span class="estyle">Act/Rules</span> </p>

      </div></a>

    </li>

    <li class="" tabindex="4">

      <div class="center-section1 section-4">

        <div class="animated fadeInUp">

          <!-- <h2></h2> -->

          <!-- <a href="#"></a> -->

        </div>

      </div>

 

      <div class="bg"></div>

     <a href="http://kroslinks.in/DTCP/checklist" target="_blank" class="estyle"> <div class="label">

        <p><div>11</div> <span class="estyle">Checklist </span></p>

      </div>

      </a>

    </li>

    <li class="" tabindex="5">

      <div class="center-section1 section-5">

        <div class="animated fadeInUp">

          <!-- <h2></h2> -->

          <!-- <a href="#"></a> -->

        </div>

      </div>

     

      <div class="bg"></div>

      <a href="http://kroslinks.in/DTCP/documents" target="_blank" class="estyle"><div class="label">

        <p><div>12</div> <span class="estyle">Documents</span></p>

      </div></a>

    </li>

    <li class="" tabindex="6">

      <div class="center-section1 section-6">

        <div class="animated fadeInUp">

          <!-- <h2></h2> -->

          <!-- <a href="#"></a> -->

        </div>

      </div>



      <div class="bg"></div>

      <a href="http://kroslinks.in/DTCP/eodb" target="_blank" class="estyle"><div class="label">

        <p><div>13</div> <span class="estyle">EODB</span></p>

      </div>

      </a>

    </li>

    <li class="" tabindex="7">

      <div class="center-section1 section-7">

        <div class="animated fadeInUp">

          <!-- <h2></h2> -->

          <!-- <a href="#"></a> -->

        </div>

      </div>



      <div class="bg"></div>

      <a href="http://kroslinks.in/DTCP/forms" target="_blank" class="estyle"><div class="label">

        <p><div>14</div> <span class="estyle">Forms</span></p>

      </div>

      </a>

    </li>

     <li class="" tabindex="8">

      <div class="center-section1 section-8">

        <div class="animated fadeInUp">

          <!-- <h2></h2> -->

          <!-- <a href="#"></a> -->

        </div>

      </div>

 

      <div class="bg"></div>

      <a href="http://kroslinks.in/DTCP/usefullinks" target="_blank"><div class="label">

        <p><div>15</div> <span class="estyle">Useful links</span></p>

      </div>

      </a>

    </li>

  

    

    <li class="" tabindex="9">

      <div class="center-section1 section-9">

        <div class="animated fadeInUp">

          <!-- <h2></h2> -->

          <!-- <a href="#"></a> -->

        </div>

      </div>

 

      <div class="bg"></div>

      <a href="http://www.tn.gov.in/tcp/contactus.htm" target="_blank" class="estyle"><div class="label">

        <p><div id="rotate">16</div> <span class="estyle">Contact Us</span></p>

      </div></a>

    </li>

    

    

    <div class="center-section1 section-intro">

      <div class="animated fadeInUp">

        <!-- <h2></h2> -->

        <p></p>

      </div>

    </div>

  </ul>

  

<span id="img_section1">

<img src="{{asset('public/front_end/newimages/innerimage.png')}}" alt="images" style="width:50%" class="img">

</span>  



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

                                    <a href="{{$wps->url}}" target="_blank">{{$wps->title}}</a>

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

                            <span class="info-box-icon bg-aqua"><img alt="Act/Rules" src="{{asset('public/front_end/newimages/icon/1.png')}}">

                            </span>

                            <div class="info-box-content">

                              <a href="{{route('homeindex','actsrules')}}"><span class="info-box-text">Act/Rules</span></a>

                            </div>

                        </div>

                    </div>

                        <div class="iconbtn">

                    <div class="info-box greenbtn">

                            <span class="info-box-icon bg-aqua "><img alt="Approvals" src="{{asset('public/front_end/newimages/icon/2.png')}}"></span>

                            <div class="info-box-content">

                              <a href="{{route('homeindex','approvals')}}"><span class="info-box-text">Approvals</span></a>

                            </div>

                        </div>

                        <!-- /.info-box-content -->

                    </div>

                        <div class="iconbtn">

                    <div class="info-box redbtn">

                            <span class="info-box-icon bg-aqua"><img alt="Land use details" src="{{asset('public/front_end/newimages/icon/3.png')}}"></span>

                            <div class="info-box-content">

                              <a href="{{route('homeindex','landusedetails')}}"><span class="info-box-text">Land use details</span></a>

                            </div>

                        </div>

                        <!-- /.info-box-content -->

                    </div>

                        <div class="iconbtn">

                    <div class="info-box skybtn">

                            <span class="info-box-icon bg-aqua"><img alt="Public View"  src="{{asset('public/front_end/newimages/icon/4.png')}}"></span>

                            <div class="info-box-content">

                              <a href="https://dtcponline.tn.gov.in/public/" target="_blank"><span class="info-box-text">Public View</span></a>

                            </div>

                        </div>

                        <!-- /.info-box-content -->

                    </div>

                        <div class="iconbtn">

                    <div class="info-box brownbtn">

                            <span class="info-box-icon bg-aqua"><img alt="Official Login"  src="{{asset('public/front_end/newimages/icon/5.png')}}"></span>

                            <div class="info-box-content">

                              <a href="https://dtcponline.tn.gov.in/dtcp4/" target="_blank"><span class="info-box-text">Official Login</span></a>

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

                        <h2><span>Particulars of  Organizations, Functions and Duties</span></h2>

                    </div>

                    <div class="news-content">

                        <!-- <h5 class="theme-color"><span>Constitution</span></h5> -->

                        <h5 class="theme-color">Constitution</h5>

                        <p>Government of Tamil Nadu (GoTN) enacted Town & Country Planning Act (T&CP Act), 1971 by repealing Town Planning Act 1920. The Directorate of Town & Country Planning (DTCP) headed by the Director is functioning under the Tamil Nadu T&CP Act, 1971. It functions under the control of Housing & Urban Development Department (H&UD) of the Secretariat. The department has its jurisdiction over the entire Tamil Nadu except Chennai Metropolitan Development Area (CMDA).</p>

                        <a class="btn btn-primary" href="{{route('homeindex','aboutus')}}">Read More</a>

                    </div>

                </div>

                <div class="col-md-6 latest-notice">

                    <div class="carousel-title">

                        <h2><span>Latest News/Notice</span></h2>

                    </div>

                    <div class="notice-content">

                      <marquee direction = "down" height="300px" onmouseover="this.stop();" onmouseout="this.start();">

                        @foreach($news as $new)

                        <div class="news-notice-content">

                            <div class="auther-content d-inline-block">

                                <div class="date"><span><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp; {{date('M d, Y',strtotime($new->created_at))}}</span></div>

                                <div class="auther"><span><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp; By admin</span></div>

                            </div>

                            <p><a href="{{$new->url}}" target="_" class="newslink">{{$new->title}}</a></p>

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
                        <!--  -->
                        <div class="single-gallery">

                            <a href="{{route('gallerydetail',isset($gal->category->id)?$gal->category->id:'')}}"  data-title="My caption"><img src="{{env('APP_URL_STORAGE').$gal->image}}" alt="gallery {{ $key }}" width="243px" height="243px"><div class="overlay">
                            <div class="categortytext">{{isset($gal->category->name)?$gal->category->name:''}}</div></div></a>

                            <!-- <div class="gallerytitle"><a href="{{route('gallerydetail',isset($gal->category->id)?$gal->category->id:'')}}">{{isset($gal->category->name)?$gal->category->name:''}}</a></div> -->

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

                        @foreach($Clientlogo as $key => $logo)

                        <div class="single-brand">

                            <a href="{{isset($logo->url)?$logo->url:'#'}}" <?php if(isset($logo->url)){?> target="_blank"<?php }?>><img src="{{env('APP_URL_STORAGE').$logo->image}}" alt="Brand {{ $key }}"></a>

                        </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection