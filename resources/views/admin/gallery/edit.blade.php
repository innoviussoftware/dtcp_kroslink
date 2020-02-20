@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Edit Gallery

    <!-- <small>advanced tables</small> -->

  </h1>

  <ol class="breadcrumb">

    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    <li><a href="{{ route('admin.slider') }}">Gallery</a></li>

    <li><a href="#">Edit</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">



    <div class="col-md-8 col-xs-8">

      <div class="box">

        <form action="{{ route('admin.gallery.update',$Gallery->id) }}" method="post" enctype="multipart/form-data">

        @csrf

        @method('PATCH')

        <input type="hidden" name="hiddenimages" value="{{$Gallery->image}}">

        <div class="box-header">

          <h3 class="box-title">Edit Gallery</h3>

        </div>

        <!-- /.box-header -->

        <div class="box-body">

          <div class="form-group">

                <label for="exampleInputEmail1">Category</label>
                <select class="form-control" name="category" required="">
                <option class="" value="">Select Category</option>
                  @foreach($category as $cat)
                  <option class="form-control" value="{{$cat->id}}" <?php if($cat->id==$Gallery->category_id){ echo 'selected';}?>>{{$cat->name}}</option>
                  @endforeach
                </select>

          </div>

          <div class="form-group">

                <label for="exampleInputEmail1">Description</label>
                <textarea class="form-control" name="description" placeholder="Enter Description">{{$Gallery->description}}</textarea>

          </div>

          <div class="form-group">

                <label for="exampleInputEmail1">Image</label>

                <input type="file" name="image[]" placeholder="" multiple="multiple">

          </div>

          <div class="form-group">

                
                <img src="{{env('APP_URL_STORAGE').$Gallery->image}}" width="200" height="150" class="img-fluid">

                @foreach($GalleryImages as $gallery)

                <img src="{{env('APP_URL_STORAGE').$gallery->images}}" width="200" height="150" class="img-fluid">

                @endforeach

          </div>

        </div>

        <!-- /.box-body -->

        <div class="box-footer">

          <button type="submit" class="btn btn-primary">Update</button>

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



