@extends('front.dashboard')

@section('content')
        <div class="container">
    		<div class="contaner-breadcrumb" style="background: url(assets/img/breadcrumbSlider.jpg);">
            <div class="row">
                <ul class="newbreadcrumb">
                    <li class="completed"><a href="{{route('homeindex','home')}}">Home</a></li>
                    <li class="active"><a href="#">Screen Reader</a></li>
                </ul>
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
