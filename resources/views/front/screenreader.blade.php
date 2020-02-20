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
/*.flat a:hover, .flat a.active, 
.flat a:hover:after, .flat a.active:after{
	background: #9EEB62;
}*/

</style>
        <div class="container">
    		<div class="contaner-breadcrumb" style="background: url(assets/img/breadcrumbSlider.jpg);">
            <div class="row">
                <!-- <ul class="newbreadcrumb">
                    <li class="completed"><a href="{{route('homeindex','home')}}">Home</a></li>
                    <li class="active"><a href="#">Screen Reader</a></li>
                </ul> -->

                <div class="breadcrumb flat">
					<a class="home" href="{{ url('/') }}"><i class="fa fa-home"></i></a>
					<a style="margin-right:20px"; href="#" class="classid_0">Screen Reader</a>
				</div>
            </div>
    	</div>
        <div class="pages_container">        		
	            <div class="row">
	                <div class="col-md-12">
					<h2 style="text-align:center">Information related to the various screen readers</h2>
					<div class="table-responsive">
					<table class="screentable" style="border:1px solid black; margin-bottom:1em">
						<tbody>
							<tr class="tblscreenheader">
								<th><span style="font-size:12px">Screen Reader</span></th>
								<th><span style="font-size:12px">Website</span></th>
								<th><span style="font-size:12px">Free / Commercial</span></th>
							</tr>
							<tr>
								<td><span style="font-size:12px">Screen Access For All (SAFA)</span></td>
								<td><span style="font-size:12px"><a href="http://www.nabdelhi.org/NAB_SAFA.htm" rel="nofollow" target="_blank">http://www.nabdelhi.org/NAB_SAFA.htm</a></span></td>
								<td><span style="font-size:12px">Free</span></td>
							</tr>
							<tr>
								<td><span style="font-size:12px">Non Visual Desktop Access (NVDA)</span></td>
								<td><span style="font-size:12px"><a href="http://www.nvda-project.org/" rel="nofollow" target="_blank">http://www.nvda-project.org/</a></span></td>
								<td><span style="font-size:12px">Free</span></td>
							</tr>
							<tr>
								<td><span style="font-size:12px">System Access To Go</span></td>
								<td><span style="font-size:12px"><a href="http://www.satogo.com/" rel="nofollow" target="_blank">http://www.satogo.com/</a></span></td>
								<td><span style="font-size:12px">Free</span></td>
							</tr>
							<tr>
								<td><span style="font-size:12px">Thunder</span></td>
								<td><span style="font-size:12px"><a href="http://www.nabdelhi.org/NAB_SAFA.htm" rel="nofollow" target="_blank">http://www.nabdelhi.org/NAB_SAFA.htm</a></span></td>
								<td><span style="font-size:12px">Free</span></td>
							</tr>
							<tr>
								<td><span style="font-size:12px">WebAnywhere</span></td>
								<td><span style="font-size:12px"><a href="http://webanywhere.cs.washington.edu/wa.php" rel="nofollow" target="_blank">http://webanywhere.cs.washington.edu/wa.php</a></span></td>
								<td><span style="font-size:12px">Free</span></td>
							</tr>
							<tr>
								<td><span style="font-size:12px">Hal</span></td>
								<td><span style="font-size:12px"><a href="http://www.yourdolphin.co.uk/productdetail.asp?id=5" rel="nofollow" target="_blank">http://www.yourdolphin.co.uk/productdetail.asp?id=5</a></span></td>
								<td><span style="font-size:12px">Commercial</span></td>
							</tr>
							<tr>
								<td><span style="font-size:12px">JAWS</span></td>
								<td><span style="font-size:12px"><a href="http://www.freedomscientific.com/jaws-hq.asp" rel="nofollow" target="_blank">http://www.freedomscientific.com/jaws-hq.asp</a></span></td>
								<td><span style="font-size:12px">Commercial</span></td>
							</tr>
							<tr>
								<td><span style="font-size:12px">Supernova</span></td>
								<td><span style="font-size:12px"><a href="http://www.yourdolphin.co.uk/productdetail.asp?id=1" rel="nofollow" target="_blank">http://www.yourdolphin.co.uk/productdetail.asp?id=1</a></span></td>
								<td><span style="font-size:12px">Commercial</span></td>
							</tr>
							<tr>
								<td><span style="font-size:12px">Window-Eyes</span></td>
								<td><span style="font-size:12px"><a href="http://www.gwmicro.com/Window-Eyes/" rel="nofollow" target="_blank">http://www.gwmicro.com/Window-Eyes/</a></span></td>
								<td><span style="font-size:12px">Commercial</span></td>
							</tr>
						</tbody>
					</table>
				</div>
	                </div>
	            </div>
        	</div>
        </div>
   <!--  </div> -->
@endsection
