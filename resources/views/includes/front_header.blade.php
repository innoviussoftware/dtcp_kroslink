<header>
    <div class="header-area">
        <div class="head-top-with-middle">
            <div class="header-top">
                <div class="container">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="user-account hidden-xs">

                                <ul class="social-custom list-inline">

                                  <li class="list-inline-item"><a href="{{$data['facebook']}}" target="_blank"><i class="fa fa-facebook-official"></i></a></li>

                                  <li class="list-inline-item"><a href="{{$data['twitter']}}" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                  <li class="list-inline-item"><a href="{{$data['linkedin']}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>

                                  <li class="list-inline-item"><a href="{{$data['pinterest']}}" target="_blank"><i class="fa fa-pinterest-square"></i></a></li>

                                  <li class="list-inline-item"><a href="{{$data['google_plus']}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>

                                  <li class="list-inline-item"><a href="{{$data['youtube']}}" target="_blank"><i class="fa fa-youtube"></i></a></li>

                              </ul>

                          </div>



                          <div class="language-option">

                            <nav>

                                <ul>

                                    <li>

                                        <div class="language dropdown-icon">

                                          @if(Session::get('newlang'))
                                            <a href="#lan-list" data-toggle="collapse" ><span>English</span></a>
                                            @else
                                              <a href="#" class="language-select" data-lang="en"><span>English</span></a>
                                            @endif

                                     </div>

                                     <ul class="dropdown-lan collapse" id="lan-list">
                                        <li>
								<a href="#" class="language-select" data-lang="tr"><span>தமிழ்</span></a>
                                            
                                        </li>

                                        
                                    </ul>

                                </li>

                                <li>

                                    <div class="screenreader">

                                     <a href="{{route('homeindex','screenreader')}}" title="Screen Reader"><span><i class="fa fa-file-text"></i> Screen Reader</span></a>

                                 </div>

                             </li>

                             <li >

                                <div class="languagereader">

                                    <ul class="list-inline">

                                        <li class="list-inline-item white" data-path="{{asset('public/front_end/css/custom.css')}}"><a href="#lan-list" title="lan-list"><i class="fa fa-circle" aria-hidden="true"></i></a></li>

                                        <li class="list-inline-item red" data-path="{{asset('public/front_end/css/red.css')}}"><a href="#lan-list" title="lan-list"><i class="fa fa-circle" aria-hidden="true"></i></a></li>

                                        <li class="list-inline-item green" data-path="{{asset('public/front_end/css/green.css')}}"><a href="#lan-list" title="lan-list"><i class="fa fa-circle" aria-hidden="true"></i></a></li>

                                    </ul>

                                </div>

                            </li>

                            <li >

                                <div class="fontreader">

                                     <ul class="list-inline">

                                        <li class="list-inline-item increasefont" data-path="fontincrease" id='16'><a href="#"  title="font Max" >A+</a></li>

                                        <li class="list-inline-item regularfont" data-path="fontregular" id='15'><a  href="#" title="font Regular" >A</a></li>

                                        <li class="list-inline-item decreasefont"  data-path="fontdecrease" id='14'><a href="#" title="font Min">A-</a></li>

                                    </ul>
                                </div>

                            </li>

                        </ul>

                    </nav>

                </div>

            </div>

        </div>

    </div>

</div>



<!-- Start Mobile Menu -->

<div class="col-md-122">

    <div class="mobile-menu-top">

        <nav>

            <ul>

                @foreach($data['menulist'] as $menu)
                
                <li>
                                            @if(isset($menu['is_submenu'])==1)

                                            <a href="#">{{$menu['name']}}</a>
                                                    <ul>
                                                        <li>
                                                            @foreach($menu['submenu'] as $menus)
                                                            
                                                            
                                                                <?php if($menus['pages'] != null){
                                                                    if($menus['pages']['external_url']!=null){?>

                                                                    <li><a href="{{$menus['pages']['external_url']}}" target="_blank" data-custom-value="$menus['pages']['id']">{{$menus['name']}}</a></li>

                                                                    <?php }else{?>
                                                                    <li><a href="{{route('homeindex',$menus['pages']['alias'])}}" data-custom-value="$menus['pages']['id']">{{$menus['name']}}</a></li>

                                                                    <?php }}else{?>

                                                                    <li><a href="{{route('homeindex','home')}}" data-custom-value="$menus['pages']['id']">{{$menus['name']}}</a></li>

                                                                <?php }?>                
                                                                
                                                            
                                                            @endforeach
                                                        </li>
                                                    </ul>
                                            @else
                                            <?php if($menu['pages'] != null){
                                                if($menu['pages']['external_url']!=null){?>
                                                <a href="{{$menu['pages']['external_url']}}" target="_blank">{{$menu['name']}}</a>

                                                <?php }else{?>

                                                <a href="{{route('homeindex',$menu['pages']['alias'])}}" >{{$menu['name']}}</a>

                                                <?php }}else{?>

                                                <a href="{{route('homeindex','home')}}" >{{$menu['name']}}</a>    
                                                <?php }?>  

                                            @endif
                </li>
                @endforeach



            </ul>

        </nav>

    </div>

</div>

<!-- End Mobile Menu -->

<div class="header-middle">

    <div class="container">

        <div class="row">

            <div class="col-md-2 col-md-2 col-xs-2 logo-xs">

                <div class="middle-section ">

                    <div class="logo">

                        <a href="{{route('homeindex','home')}}"><img src="{{asset('public/front_end/newimages/logo.png')}}" alt="logo"></a>

                    </div>
                </div>
            </div>
                <div class="col-md-8 col-sm-8 col-xs-8 text-center hidden-xs">
                    <div class="middle-section ">
                        <div class="menu-with-card ">
                            <div class="middle-menu">
                                <div class="slogan">
                                    <div class="name">Directorate of Town and Country Planning</div>
                                    <div class="content hidden-xs">நகர் ஊரமைப்பு இயக்ககம்</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">

                    <div class="menu-with-card">

                        <div class="search-with-card">

                            <div class="card right">

                                <div class="card-wrapper">

                                    <div class="logo-icon"><a href="#"><img src="{{asset('public/front_end/newimages/DTCP.png')}}" alt="TNeGA"></a></div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                            <div class="col-xs-12 hidden-lg hidden-md  hidden-sm hidden-ms hidden-lg">

                                <div class="middle-section ">

                                    <div class="menu-with-card ">

                                        <div class="middle-menu">

                                            <div class="slogan">

                                                <div class="name">Directorate of Town and Country Planning</div>

                                                <div class="content hidden-xs">நகர் ஊரமைப்பு இயக்ககம்</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            

            <div class="main-menu-area hidden-xs hidden-sm">

                <div class="container">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="main-menu home-one-menu" id="menuactive">
                                <nav>
                                    <ul>
                                        @foreach($data['menulist'] as $key=>$menu)
                                        @if($key>7)
                                        <li>
                                            @if(isset($menu['is_submenu'])==1)

                                            <a href="#" id="parent">{{$menu['name']}}</a>
                                                    <ul class="megamenu first-mega">
                                                        <li>
                                                            @foreach($menu['submenu'] as $menus)
                                                            
                                                            <ul class="single-mega-1">
                                                        <?php if($menus['pages'] != null){


                                                            if($menus['pages']['external_url']!=null){?>

                                                                <li><a href="$menus['pages']['external_url']" data-custom-value="$menus['pages']['id']" target="_blank">{{$menus['name']}}</a></li>

                                                            <?php }else{?>

                                                                <li><a href="{{route('homeindex',$menus['pages']['alias'])}}" data-custom-value="$menus['pages']['id']">{{$menus['name']}}</a></li>

                                                            <?php }}else{?>

                                                                <li><a href="{{route('homeindex','home')}}" data-custom-value="$menus['pages']['id']">{{$menus['name']}}</a></li>
                                                            <?php }?>                
                                                                
                                                            </ul>
                                                            @endforeach
                                                        </li>
                                                    </ul>
                                            @else
                                            <?php if($menu['pages'] != null){

                                                if($menu['pages']['external_url']!=null){?>

                                                <a href="{{$menu['pages']['external_url']}}" target="_blank">{{$menu['name']}}</a>

                                                <?php }else{?>

                                                <a href="{{route('homeindex',$menu['pages']['alias'])}}" >{{$menu['name']}}</a>

                                                <?php }}else{?>

                                                <a href="{{route('homeindex','home')}}" >{{$menu['name']}}</a>

                                            <?php }?>  
                                            @endif
                                        </li>
                                         @break
                                        @else
                                        <li>
                                            @if(isset($menu['is_submenu'])==1)

                                            <a href="#" id="parent">{{$menu['name']}}</a>
                                                    <ul class="megamenu first-mega">
                                                        <li>
                                                            @foreach($menu['submenu'] as $menus)
                                                            
                                                            <ul class="single-mega-1">
                                                                <?php if($menus['pages'] != null){
                                                                    if($menus['pages']['external_url']!=null){?>

                                                                    <li><a href="{{$menus['pages']['external_url']}}"  data-custom-value="$menus['pages']['id']" target="_blank">{{$menus['name']}}</a></li>

                                                                    <?php }else{?>
                                                                    <li><a href="{{route('homeindex',$menus['pages']['alias'])}}" data-custom-value="$menus['pages']['id']">{{$menus['name']}}</a></li>

                                                                    <?php }}else{?>

                                                                    <li><a href="{{route('homeindex','home')}}" data-custom-value="$menus['pages']['id']">{{$menus['name']}}</a></li>

                                                                <?php }?>                
                                                                
                                                            </ul>
                                                            @endforeach
                                                        </li>
                                                    </ul>
                                            @else
                                            <?php if($menu['pages'] != null){
                                                if($menu['pages']['external_url']!=null){?>
                                                <a href="{{$menu['pages']['external_url']}}" target="_blank">{{$menu['name']}}</a>

                                                <?php }else{?>

                                                <a href="{{route('homeindex',$menu['pages']['alias'])}}" >{{$menu['name']}}</a>

                                                <?php }}else{?>

                                                <a href="{{route('homeindex','home')}}" >{{$menu['name']}}</a>    
                                                <?php }?>  

                                            @endif
                                        </li>
                                        @endif
                                        
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>

                            <div class="toogle hamburgermenu">
                                <div class="dropdown">
                                    <ul class="nav navbar-nav pull-right">
                                        <li class="navbar-btn hamburger">
                                                <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <div class="menu" style="display: block; float:right;">
                                      <ul>
                                        @foreach($data['menulist'] as $key=>$menu)
                                        @if($key>7)
                                         <li class="child">
                                            @if(isset($menu['is_submenu'])==1)
                                            <a href="#" id="parent">{{$menu['name']}}</a>
                                                    <ul>
                                                        <li>
                                                            @foreach($menu['submenu'] as $menus)
                                                            <ul class="parent">
                                                                <?php if($menus['pages'] != null){
                                                                    if($menus['pages']['external_url']!=null){?>
                                                                    <li><a href="{{$menus['pages']['external_url']}}" data-custom-value="$menus['pages']['id']" target="_blank">{{$menus['name']}}</a></li>

                                                                    <?php }else{?>

                                                                    <li><a href="{{route('homeindex',$menus['pages']['alias'])}}" data-custom-value="$menus['pages']['id']">{{$menus['name']}}</a></li>

                                                                    <?php }}else{?>
                                                                    <li><a href="{{route('homeindex','home')}}" data-custom-value="$menus['pages']['id']">{{$menus['name']}}</a></li>
                                                                <?php }?>                
                                                                
                                                            </ul>
                                                            @endforeach
                                                        </li>
                                                    </ul>
                                            @else
                                            <?php if($menu['pages'] != null){
                                                if($menu['pages']['external_url']!=null){?>
                                                    <a href="{{$menu['pages']['external_url']}}" target="_blank" >{{$menu['name']}}</a>

                                                <?php }else{?>

                                                    <a href="{{route('homeindex',$menu['pages']['alias'])}}" >{{$menu['name']}}</a>

                                                <?php }}else{?>

                                                <a href="{{route('homeindex','home')}}" >{{$menu['name']}}</a>    

                                                <?php }?>  
                                            @endif
                                        </li>
                                        @else
                                        
                                        @endif
                                        
                                        @endforeach
                                    </ul>
                                </div> 
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- End Main Menu -->

            <div class="headermarque">

               <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <div class="whatsnewmarquee">

                            <!-- <i class="fa fa-circle-o"></i> -->

                            <!-- <marquee direction="left">Applicants or persons authorized by applicants alone contact Commissioner in person at the oﬃce from Monday to Friday between 12.00 noon and 1.00 p.m.</marquee> -->

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</header>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>

    function googleTranslateElementInit() {

      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');

  }



  function triggerHtmlEvent(element, eventName) {

      var event;

      if (document.createEvent) {

          event = document.createEvent('HTMLEvents');

          event.initEvent(eventName, true, true);

          element.dispatchEvent(event);

      } else {

          event = document.createEventObject();

          event.eventType = eventName;

          element.fireEvent('on' + event.eventType, event);

      }

  }



  // jQuery('.language-select').click(function() {

  //     var theLang = jQuery(this).attr('data-lang');

  //     jQuery('.goog-te-combo').val(theLang);

  //     window.location = jQuery(this).attr('href');

  //     location.reload();



  // });

</script>

<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>

    $('.languagereader ul li').on('click', function(){

        var path = $(this).data('path');

        $('#color-switcher').attr('href', path);

    });

    $('.fontreader ul li').on('click', function(){

        var path = $(this).data('path');
        
        
        if(path=='fontincrease'){
            var regularfont = $('.regularfont').attr('id');
            var limit = parseInt(regularfont) + 2;
            // $("h3").css("font-size",'25px'); 
            var iid = $(this).attr('id');

            if(iid <= limit){

                var decr = parseInt(iid) + 1;
                var h3font=parseInt(25) + 2;
                $(this).attr('id',decr);
                $("p").css("font-size",iid+'px');  
                $("a").css("font-size",iid+'px'); 
                $("ul").css("font-size",iid+'px'); 
                $("td span").css("font-size",iid+'px'); 
                $("th span").css("font-size",iid+'px'); 
                // $("h3").css("font-size",h3font+'px'); 
                // $("h2").css("font-size",h3font+'px'); 
                // $("h2").css("text-align",'center'); 
                // $("h3").css("text-align",'left'); 
                // $("h3").css("color",'#000'); 
                // $("h3").css("margin",'15px 0px'); 
                $("#menuactive").addClass("incmenuclass");


            }
        }

        if(path=='fontregular'){
            
            $(this).attr('id',15);
            $('.increasefont').attr('id',16);
            $('.decreasefont').attr('id',14);
            $("p").css("font-size",'15px');  
            $("a").css("font-size",'15px'); 
            $("ul").css("font-size",'15px'); 
            $("td span").css("font-size",'12px'); 
            $("th span").css("font-size",'12px'); 
            // $("h3").css("font-size",'25px'); 
            // $("h2").css("font-size",'30px'); 
            // $("h2").css("text-align",'center'); 
            // $("h3").css("text-align",'left'); 
            // $("h3").css("color",'#000'); 
            // $("h3").css("margin",'15px 0px'); 
            $("#menuactive").addClass("normalclass");
        }

        if(path == 'fontdecrease'){
            var regularfont = $('.regularfont').attr('id');
            var limit = parseInt(regularfont) - 2;
            var iid = $(this).attr('id');
            // $("h3").css("font-size",'20px'); 
            if(iid >= limit){
                var decr = parseInt(iid) - 1;
                var h3font=parseInt(20) - 2;
                $(this).attr('id',decr);
                $("p").css("font-size",iid+'px');  
                $("a").css("font-size",iid+'px');  
                $("ul").css("font-size",iid+'px');
                $("td span").css("font-size",iid+'px'); 
                $("th span").css("font-size",iid+'px'); 
                // $("h3").css("font-size",h3font+'px'); 
                // $("h2").css("font-size",iid+'px'); 
                // $("h2").css("text-align",'center'); 
                // $("h3").css("text-align",'left'); 
                // $("h3").css("color",'#000'); 
                // $("h3").css("margin",'15px 0px'); 
                $("#menuactive").addClass("decmenuclass");
            }
        }
 });
    var current = location.pathname;
    $('#menuactive a').each(function(){
        var $this = $(this);
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('active');
            //$('#parent').addClass('active');
        }
    })
    $('.hamburgermenu a').each(function(){
        var $this = $(this);
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('active');
            //$('#parent').addClass('active');
        }
    })


</script>
<script>
    $( ".close" ).hide();
    $( ".menu" ).hide();
    $( ".hamburger" ).click(function() {
        $( ".menu" ).slideToggle( "slow", function() {
            // $( ".hamburger" ).hide();
            $( ".close" ).show();
        });
    });

    $( ".close" ).click(function() {
        $( ".menu" ).slideToggle( "slow", function() {
            // $( ".close" ).hide();
            $( ".hamburger" ).show();
        });
    });

    $( ".language-select" ).click(function() {
        var lang=($(this).attr("data-lang"));
        
        var url="{{route('lang')}}";
        $.ajax({
                type: 'GET',
                url: url,
                data: { lang:lang},
                success:function(data){
                   location.reload();
                }
        }); 
    });

 
</script>