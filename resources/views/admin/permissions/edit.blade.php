@extends('layouts.admin')

@section('content')
<section class="content-header">
  <h1>
    Edit Permission
    <!-- <small>advanced tables</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route('admin.permissions') }}">Permission</a></li>
    <li><a href="#">Edit</a></li>
  </ol>
</section>

<section class="content">
  <div class="row">

    <div class="col-md-12 col-xs-12">
      <div class="box">
        <form action="{{ route('admin.permissions.update',$Permission->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="box-header">
          <h3 class="box-title">Edit Permission</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" value="{{ $Permission->name }}" name="name" class="form-control" placeholder="Enter Name" required="">
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ route('admin.permissions') }}" class="btn btn-default">Cancel</a>
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

