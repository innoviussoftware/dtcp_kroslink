<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!-- Basic page needs

        ============================================ -->

    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Directorate of Town and Country Planning, Government of Tamil Nadu</title>

    <meta name="description" content="">



    <!-- Mobile specific metas

        ============================================ -->

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Favicon

        ============================================ -->

    <link rel="apple-touch-icon" href="{{asset('public/front_end/newimages/apple-touch-icon.png')}}">

    <link rel="icon" type="image/png" href="{{asset('public/front_end/newimages/favicon.png')}}">



    <!-- CSS  -->



    <link rel="stylesheet" href="{{asset('public/front_end/css/lightslider.css')}}">



    <!-- lightbox CSS

        ============================================ -->

    <link rel="stylesheet" href="{{asset('public/front_end/css/lightbox.min.css')}}">



    <!-- normalize CSS

        ============================================ -->

    <link rel="stylesheet" href="{{asset('public/front_end/css/normalize.css')}}">



    <!-- font-awesome CSS

        ============================================ -->

    <link rel="stylesheet" href="{{asset('public/front_end/css/font-awesome.min.css')}}">



    <!-- main CSS

        ============================================ -->

    <link rel="stylesheet" href="{{asset('public/front_end/css/main.css')}}">



    <!-- animate CSS

        ============================================ -->

    <link rel="stylesheet" href="{{asset('public/front_end/css/animate.min.css')}}">



    <!-- camera CSS

        ============================================ -->

    <link rel="stylesheet" href="{{asset('public/front_end/css/camera.css')}}">



    <!-- owl.carousel CSS

        ============================================ -->

    <link rel="stylesheet" href="{{asset('public/front_end/css/owl.carousel.css')}}">



    <!-- timeTo CSS

        ============================================ -->

    <link rel="stylesheet" href="{{asset('public/front_end/css/timeTo.css')}}">



    <!-- owl.theme CSS

        ============================================ -->

    <link rel="stylesheet" href="{{asset('public/front_end/css/owl.theme.default.min.css')}}">



    <!-- bootstrap CSS

        ============================================ -->

    <link rel="stylesheet" href="{{asset('public/front_end/css/bootstrap.min.css')}}">



    <!-- bootstrap-select CSS

        ============================================ -->

    <link rel="stylesheet" href="{{asset('public/front_end/css/bootstrap-select.min.css')}}">



    <!-- jquery-ui CSS

        ============================================ -->

    <link rel="stylesheet" href="{{asset('public/front_end/css/jquery-ui.css')}}">



    <!-- meanmenu CSS

        ============================================ -->

    <link rel="stylesheet" href="{{asset('public/front_end/css/meanmenu.css')}}">



    <!-- style CSS

        ============================================ -->

    <link rel="stylesheet" href="{{asset('public/front_end/style.css')}}">



    <!-- responsive CSS

        ============================================ -->

    <link rel="stylesheet" href="{{asset('public/front_end/css/responsive.css')}}">

    <link rel="stylesheet" href="{{asset('public/front_end/css/custom.css')}}">

    <link rel="stylesheet" href="{{asset('public/front_end/css/custom-new.css')}}" >
    <link rel="stylesheet" href="{{asset('public/front_end/css/default.css')}}"  id="color-switcher">

</head>



<body>

    <!--[if lt IE 8]>

      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>

      <![endif]-->

    <!-- Start Header -->

   @include('includes.tamil.front_header',$data)

    <!-- End Header -->

    <!-- Start Slider -->

   @yield('content')



    



    <!-- Start Footer -->

    @include('includes.tamil.front_footer',$data)

    <!-- End Footer -->



    <!-- JS -->



    <script src="{{asset('public/front_end/js/jquery-1.12.4.min.js')}}"></script>



    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>



    <!-- jquery.easing js -->

    <script src="{{asset('public/front_end/js/jquery.easing.1.3.js')}}"></script>



    <!-- carousel js -->

    <script src="{{asset('public/front_end/js/owl.carousel.min.js')}}"></script>



    <!-- lightslider js -->

    <script src="{{asset('public/front_end/js/lightslider.js')}}"></script>



    <!-- camera js -->

    <script src="{{asset('public/front_end/js/camera.min.js')}}"></script>



    <!-- jquery.mobile.customized js -->

    <script src="{{asset('public/front_end/js/jquery.mobile.customized.min.js')}}"></script>



   



    <!-- bootstrap.min js -->

    <script src="{{asset('public/front_end/js/bootstrap.min.js')}}"></script>



    <!-- jquery.time-to js -->

    <script src="{{asset('public/front_end/js/jquery.time-to.min.js')}}"></script>



    <!-- jquery-ui js -->

    <script src="{{asset('public/front_end/js/jquery-ui.js')}}"></script>



    <!-- lightbox js -->

    <script src="{{asset('public/front_end/js/lightbox.min.js')}}"></script>



    <!-- meanmenu js -->

    <script src="{{asset('public/front_end/js/jquery.meanmenu.js')}}"></script>



    <!-- bootstrap-select js -->

    <script src="{{asset('public/front_end/js/bootstrap-select.min.js')}}"></script>



    <!-- validator js -->

    <script src="{{asset('public/front_end/js/validator.min.js')}}"></script>



    <!-- main js -->

    <script src="{{asset('public/front_end/js/main.js')}}"></script>
    <script>
    function GetIEVersion() {
      var sAgent = window.navigator.userAgent;
      var Idx = sAgent.indexOf("MSIE");

      // If IE, return version number.
      if (Idx > 0) 
        return parseInt(sAgent.substring(Idx+ 5, sAgent.indexOf(".", Idx)));

      // If IE 11 then look for Updated user agent string.
      else if (!!navigator.userAgent.match(/Trident\/7\./)) 
        return 11;

      else
        return 0; //It is not IE
    }

    
    if (isIE()){
        if (GetIEVersion() < 9) {
            alert("Your Internet explorer version is not compatible. Please update your Internet Explorer for better experience.");
        }
    }

    function isIE() {
  ua = navigator.userAgent;
  /* MSIE used to detect old browsers and Trident used to newer ones*/
  var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;
  
  return is_ie; 
}
        
    
    </script>

    

</body>



</html>