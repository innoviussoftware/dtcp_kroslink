@extends('layouts.admin')

@section('content')
<section class="content-header">
  <h1>
    Add User
    <!-- <small>advanced tables</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">User</a></li>
    <li><a href="#">Add</a></li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-8 col-xs-8">
      <div class="box">
        <form action="{{route('admin.users.storeusers')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="box-header">
          <h3 class="box-title">Add User</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Enter Name" required="">
          </div>

          <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" value="{{ old('email') }}" name="email" class="form-control" placeholder="Enter Email" required="">
          </div>

          <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required="">
          </div>

          <div class="form-group">
                <label for="exampleInputEmail1">Roles</label>
                <select class="form-control" required="" name="roles">
                  <option value="">Select Role</option>
                  @foreach($role as $r)
                  <option value="{{$r->id}}">{{$r->display_name}}</option>
                  @endforeach
                </select>
          </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
           <a href="{{ route('admin.slider') }}" class="btn btn-default">Cancel</a>
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
