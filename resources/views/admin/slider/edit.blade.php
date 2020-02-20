@extends('layouts.admin')

@section('content')
<section class="content-header">
  <h1>
    Edit Slider
    <!-- <small>advanced tables</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route('admin.slider') }}">Sliders</a></li>
    <li><a href="#">Edit</a></li>
  </ol>
</section>

<section class="content">
  <div class="row">

    <div class="col-md-6 col-xs-12">
      <div class="box">
        <form action="{{ route('admin.slider.update',$Slider->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <input type="hidden" name="hiddenimages" value="{{$Slider->image}}">
        <div class="box-header">
          <h3 class="box-title">Edit Slider</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <div class="form-group">
                <label for="exampleInputEmail1">Page</label>
                <select class="form-control" required="" name="page">
                  <option class="form-control" value="">Select Page</option>
                  @foreach($pages as $page)
                  <option class="form-control" value="{{$page->id}}" <?php if($page->id==$Slider->page_id){ echo 'selected';}?>>{{$page->title}}</option>
                  @endforeach
                </select>
          </div>

          <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input type="file" name="image[]" class="form-control" placeholder="" multiple="multiple">
          </div>
          <div class="form-group">
                @foreach($SliderImages as $sliders)
                <img src="{{env('APP_URL_STORAGE').$sliders->images}}" width="200" height="150" class="img-fluid">
                @endforeach
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Update</button>
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

