@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Change Password

    <!-- <small>advanced tables</small> -->

  </h1>

  <ol class="breadcrumb">

    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    <li><a href="{{ route('admin.changepassword') }}">Change Password</a></li>

    <li><a href="#">Edit</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">



    <div class="col-md-8 col-xs-8">

      <div class="box">

        <form action="{{route('admin.resetpassword')}}" method="post" enctype="multipart/form-data">

        @csrf

       

        

        <div class="box-header">

          <h3 class="box-title">Change Password</h3>

        </div>
        

        <!-- /.box-header -->

        <div class="box-body">

       

          <div class="form-group">

                <label for="exampleInputEmail1">Current Password</label>
                <input type="password" name="currentpassword" class="form-control" placeholder="Enter current password" required="">
                

          </div>

          <div class="form-group">

                <label for="exampleInputEmail1">New Password</label>
                <input type="password" name="newpassword" class="form-control" placeholder="Enter new password" required="">
                

          </div>

           <div class="form-group">

                <label for="exampleInputEmail1">Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Enter confirm password" required="">

          </div>


        

        </div>

        <!-- /.box-body -->

        <div class="box-footer">

          <button type="submit" class="btn btn-primary">Submit</button>

          <a href="{{ route('admin.gallery') }}" class="btn btn-default">Cancel</a>

        </div>

      </form>

      </div>

      <!-- /.box -->

    </div>

    <!-- /.col -->

  </div>

  <!-- /.row -->

</section>

@endsection

@section('custom_js')

<script src="{{ asset('public/admin_assets/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>

<script src="{{{ asset('public/admin_assets/plugins/ckeditor/ckeditor.js') }}}" type="text/javascript"></script>

<script type="text/javascript">

    $(function () {

      // Replace the <textarea id="editor1"> with a CKEditor

      // instance, using default configuration.

        CKEDITOR.replace('content');

     });

     

     //Flat red color scheme for iCheck

        $('input[type="radio"]').iCheck({

          radioClass: 'iradio_flat-red'

        });

  </script>

@endsection



