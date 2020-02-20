@extends('layouts.admin')

@section('content')
<section class="content-header">
  <h1>
    Add Header
    <!-- <small>advanced tables</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">Header</a></li>
    <li><a href="#">Add</a></li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-6 col-xs-6">
      <div class="box">
        <form action="{{route('admin.header.storeheader')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="box-header">
          <h3 class="box-title">Add Header</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          
          <div class="form-group">
                <label for="exampleInputEmail1">Primary Logo</label>
                <input type="file" name="primarylogo" class="form-control" placeholder="" required="">
          </div>

          <div class="form-group">
                <label for="exampleInputEmail1">Primary Title</label>
                <input type="text" name="PrimaryTitle" class="form-control" placeholder="" required="">
          </div>

          <div class="form-group">
                <label for="exampleInputEmail1">Secondary Title</label>
                <input type="text" name="SecondaryTitle" class="form-control" placeholder="" required="">
          </div>

          <div class="form-group">
                <label for="exampleInputEmail1">Secondary Logo</label>
                <input type="file" name="secondarylogo" class="form-control" placeholder="" required="">
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
