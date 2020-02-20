<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Directorate of Town and Country Planning</title>
<link rel="icon" type="image/png" href="{{asset('public/front_end/newimages/favicon.png')}}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('public/admin_assets/dist/css/lightbox.min.css')}}">


  <link rel="stylesheet" href="{{asset('public/admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/admin_assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('public/admin_assets/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/admin_assets/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('public/admin_assets/dist/css/skins/_all-skins.min.css')}}">

  <link rel="stylesheet" href="{{asset('public/admin_assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin_assets/bower_components/select2/dist/css/select2.min.css')}}">


  <!-- Morris chart -->
  <!-- <link rel="stylesheet" href="{{ env('APP_URL') }}/admin_assets/bower_components/morris.js/morris.css"> -->
  <!-- jvectormap -->
  <!-- <link rel="stylesheet" href="{{ env('APP_URL') }}/admin_assets/bower_components/jvectormap/jquery-jvectormap.css"> -->
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('public/admin_assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin_assets/bower_components/timepicker/bootstrap-timepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin_assets/bower_components/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css')}}">

  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="{{ env('APP_URL') }}/admin_assets/bower_components/bootstrap-daterangepicker/daterangepicker.css"> -->
  <!-- bootstrap wysihtml5 - text editor -->
  <!-- <link rel="stylesheet" href="{{ env('APP_URL') }}/admin_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="{{ env('APP_URL') }}/admin_assets/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="{{ env('APP_URL') }}/admin_assets/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Header -->
  @include('includes.admin_header')

  <!--If admin role is super admin-->
  
    @include('includes.admin_sidebar')
        <div class="content-wrapper">
            @include('includes.admin_success')
            @include('includes.admin_errors')
            @yield('content')
        </div>
  

 


  <!-- Footer -->
  @include('includes.admin_footer')

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('public/admin_assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<!-- <script src="{{ env('APP_URL') }}/admin_assets/bower_components/jquery-ui/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="{{asset('public/admin_assets/dist/js/lightbox-plus-jquery.min.js')}}"></script>
<script>
  // $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('public/admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
 <script src="{{asset('public/js/bootbox.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('public/admin_assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin_assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<!-- <script src="{{ env('APP_URL') }}/admin_assets/bower_components/raphael/raphael.min.js"></script>
<script src="{{ env('APP_URL') }}/admin_assets/bower_components/morris.js/morris.min.js"></script> -->
<!-- Sparkline -->
<!-- <script src="{{ env('APP_URL') }}/admin_assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script> -->
<!-- jvectormap -->
<!-- <script src="{{ env('APP_URL') }}/admin_assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ env('APP_URL') }}/admin_assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="{{ env('APP_URL') }}/admin_assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<!-- <script src="{{ env('APP_URL') }}/admin_assets/bower_components/moment/min/moment.min.js"></script>
<script src="{{ env('APP_URL') }}/admin_assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script> -->
<!-- datepicker -->
<script src="{{asset('public/admin_assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('public/admin_assets/bower_components/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('public/admin_assets/bower_components/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js')}}"></script>

<!-- Bootstrap WYSIHTML5 -->
<!-- <script src="{{ env('APP_URL') }}/admin_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
<!-- Slimscroll -->
<!-- <script src="{{ env('APP_URL') }}/admin_assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<!-- FastClick -->
<!-- <script src="{{ env('APP_URL') }}/admin_assets/bower_components/fastclick/lib/fastclick.js"></script> -->

<!-- AdminLTE App -->
<script src="{{asset('public/admin_assets/dist/js/adminlte.min.js')}}"></script>
  @yield('custom_js')
  <script type="text/javascript">
$(document).ready(function () {
    

    timer = setTimeout(function () {
        $('.alert-success').hide();
    }, 3000);

    timer = setTimeout(function () {
        $('.alert-danger').hide();
    }, 3000);
    
});
function confirm(url, name) {
    bootbox.confirm({
        title: '',
        message: '<h5><i class="fa fa-remove text-danger"></i>&nbsp;&nbsp;' + name + '</h5>',
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> Cancel'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Confirm'
            }
        },
        callback: function (result) {
            if (result == true) {
                window.location.replace(url);
            }
        }
    });
}
  </script>
</body>
</html>
