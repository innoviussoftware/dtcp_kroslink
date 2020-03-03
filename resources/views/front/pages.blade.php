@extends('front.dashboard')

@section('content')
<style type="text/css">
    .breadcrumb {
    /*centering*/
    display: inline-block;
    /*box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.35);*/
    overflow: hidden;
    border-radius: 5px;
    /*Lets add the numbers for each link using CSS counters. flag is the name of the counter. to be defined using counter-reset in the parent element of the links*/
    counter-reset: flag; 
    /*border: 1px solid #999;*/
}

.breadcrumb a {
    text-decoration: none;
    outline: none;
    display: block;
    float: left;
    font-size: 15px;
    line-height: 36px;
    color: white;
    padding: 0 30px 0 50px;
    background: #666;
    background: linear-gradient(#666, #333);
    position: relative;
    border: 1px solid #999;
     font-family: 'Montserrat',sans-serif;
}
.breadcrumb a:first-child {
    padding-left: 20px;
    padding-right: 10px;
    border-radius: 5px 0 0 5px;
}
.breadcrumb a:first-child:before {
    left: 14px;
}

/*adding the arrows for the breadcrumbs using rotated pseudo elements*/
.breadcrumb a:after {
    content: '';
    position: absolute;
    top: 0; 
    right: -18px; /*half of square's length*/
    /*same dimension as the line-height of .breadcrumb a */
    width: 36px; 
    height: 36px;
    transform: scale(0.707) rotate(45deg);
    z-index: 1;
    background: #666;
    background: linear-gradient(135deg, #666, #333);
    /*box-shadow: 
        2px -2px 0 2px rgba(0, 0, 0, 0.4), 
        3px -3px 0 2px rgba(255, 255, 255, 0.1);*/
    box-shadow: 1px -1px 0 1px rgba(0, 0, 0, 0.4), 3px -3px 0 2px rgba(255, 255, 255, 0.1);
    /*
        5px - for rounded arrows and 
        50px - to prevent hover glitches on the border created using shadows*/
    border-radius: 0 5px 0 50px;
}
/*we dont need an arrow after the last link*/
/*.breadcrumb a:last-child:after {
    content: none;
}*/
/*we will use the :before element to show numbers*/
.breadcrumb a:before {
    /*content: counter(flag);*/
    /*counter-increment: flag;*/
    /*some styles now*/
    border-radius: 100%;
    width: 20px;
    height: 20px;
    line-height: 20px;
    margin: 8px 0;
    position: absolute;
    top: 0;
    left: 30px;
    background: #444;
    background: linear-gradient(#444, #222);
    font-weight: bold;
}


.flat a, .flat a:after {
    background: white;
    color: black;
    transition: all 0.5s;
}
.flat a:before {
    background: white;
    box-shadow: 0 0 0 1px #ccc;
}
.breadcrumb.flat a i{ 
    color: #0f7a9e;
    font-size: 18px;
}
.breadcrumb.flat a.classid_0{
    background: #ECECEC;
    color: #808080;
    /*margin-right: 20px;*/
}
.breadcrumb.flat a.classid_0:after{
    background: #ECECEC;
}

.breadcrumb.flat a.classid_1{
    background: #0F79A0;
    margin-right: 20px;
    color: #fff;
}
.breadcrumb.flat a.classid_1:after{
    background: #0F79A0;
}
.left-sidebar{
    border-right: 5px solid #0f7a9e;
    padding-right: 15px;
    height: 100%;
}
.right-sidebar marquee ul li{
    margin-bottom: 5px;
}
/*.flat a:hover, .flat a.active, 
.flat a:hover:after, .flat a.active:after{
    background: #9EEB62;
}*/

</style>
<!-- <div class="latest-infobox-area section-p-30"> -->
    <div class="container-fluid">
        <div class="row">
            <div class="inner-banner-image">
                <?php 
                        if(isset($pages->bannerimage)){?>
                            <img src="{{ env('APP_URL_STORAGE').$pages->bannerimage}}"/>
                        <?php }else{?>
                        <img src="{{ asset('public/front_end/newimages/ci-wss-banner.jpg') }}"/>
                    <?php }?>
            </div>
        </div>
        <div class="row bgcolor-breadcrumb">
            <div class="contaner-breadcrumb">
            <div class="container">
                <div class="breadcrumb flat">
                    <a class="home" href="{{ url('/') }}"><i class="fa fa-home"></i></a>
                    @foreach($breadcumb as $key => $bd)
                    <?php if(count($breadcumb) == 2){
                        $css = '';
                    }else{
                        $css = "style=margin-right:20px;";
                    }
                    ?>
                    <a {{ $css }} href="#" class="classid_{{$key}}">{{ucfirst($bd)}}</a>
                    @endforeach
                </div>
            </div>
            <!-- Page Header End -->
            <!-- Start Content -->
            </div>
        </div>
    </div>
    <div class="container">
        
        
        <div class="pages_container">        		
	        <div class="row">
	            <div class="col-md-9">
                    <div class="left-sidebar">
                    <?php 
                    	if(isset($pages)){
                    		echo html_entity_decode($pages->page_content);
                    	}
                    ?>
                    </div>
	            </div>
                <div class="col-md-3">
                    <div class="right-sidebar">
                    <h3 class="sidebar-whatnew">What's New<span><img src="{{ asset('public/front_end/newimages/12.png') }}" alt="What's New"></span></h3>
                    <!-- <marquee direction="down" HEIGHT="100%" onmouseover="this.stop();" onmouseout="this.start();"> -->
                    <ul>
                        @foreach($wpnew as $wps)

                                    <li><a href="{{$wps->url}}" target="_blank">{{$wps->title}}</a></li>

                        @endforeach
                    </ul>
                    <!-- </marquee> -->
                    </div>
                </div>
	        </div>
        </div>
    </div>
   <!--  </div> -->
@endsection
