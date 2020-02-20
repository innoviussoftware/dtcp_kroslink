@extends('layouts.admin')

@section('content')
<section class="content-header">
  <h1>
    Add Slider
    <!-- <small>advanced tables</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">Sliders</a></li>
    <li><a href="#">Add</a></li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-6 col-xs-6">
      <div class="box">
        <form action="{{route('admin.slider.storeslider')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="box-header">
          <h3 class="box-title">Add Slider</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          
          <div class="form-group">
                <label for="exampleInputEmail1">Page</label>
                <select class="form-control" required="" name="page">
                  <option class="form-control" value="">Select Page</option>
                  @foreach($pages as $page)
                  <option class="form-control" value="{{$page->id}}">{{$page->title}}</option>
                  @endforeach
                </select>
          </div>

          <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input type="file" name="image[]" class="form-control" placeholder="" required="" multiple="multiple">
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
