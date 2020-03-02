
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Directorate of Town and Country Planning | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="{{asset('public/front_end/newimages/favicon.png')}}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('public/admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/admin_assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('public/admin_assets/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/admin_assets/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('public/admin_assets/plugins/iCheck/square/blue.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="{{asset('public/front_end/images/dtcp_logo.png')}}" width="150" height="150">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><b>Directorate of Town and Country Planning</b></p>

    @if(Session::has('danger'))
        <div class="alert alert-danger">
          {{ Session::get('danger')}}
        </div>
    @endif

    @if(Session::has('success'))
        <div class="alert alert-success">
          {{ Session::get('success')}}
        </div>
    @endif
    <form action="{{ route('passwordsubmit') }}" method="post">
        @csrf
      <div class="form-group has-feedback">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter email address" />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
      </div>
      

      <div class="row">
        
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Send Email</button>
        </div>
        <br><br>
        <div class="col-xs-12">
          <a href="{{route('login')}}">Back to Login ?</a>
        </div>
        <!-- /.col -->
      </div>
        
              
      </div>
      
     
      <br>
    
    </form>

   
    <!-- /.social-auth-links -->
<br>
  <!--   <a href="{{route('reset_password')}}">I forgot my password</a><br> -->
   <!--  <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('public/admin_assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('public/admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ asset('public/admin_assets/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
