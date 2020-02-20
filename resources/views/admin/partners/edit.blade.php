@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Edit Useful Links

    <!-- <small>advanced tables</small> -->

  </h1>

  <ol class="breadcrumb">

    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    <li><a href="{{ route('admin.partners') }}">Useful Links</a></li>

    <li><a href="#">Edit</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">



    <div class="col-md-6 col-xs-6">

      <div class="box">

        <form action="{{ route('admin.partners.update',$Gallery->id) }}" method="post" enctype="multipart/form-data">

        @csrf

        @method('PATCH')

        <input type="hidden" name="hiddenimages" value="{{$Gallery->image}}">

        <div class="box-header">

          <h3 class="box-title">Edit Useful Links</h3>

        </div>

        <!-- /.box-header -->

        <div class="box-body">

          <div class="form-group">

                <label for="exampleInputEmail1">Image</label>

                <input type="file" name="image" placeholder="">

          </div>

          <div class="form-group">

                <img src="{{env('APP_URL_STORAGE').$Gallery->image}}" width="550" height="150" class="img-fluid">

          </div>

          <div class="form-group">

                <label for="exampleInputEmail1">Link</label>

                <input type="url" name="url" placeholder="Enter Link" value="{{$Gallery->url}}" class="form-control">

          </div>

        </div>

        <!-- /.box-body -->

        <div class="box-footer">

          <button type="submit" class="btn btn-primary">Update</button>

          <a href="{{ route('admin.partners') }}" class="btn btn-default">Cancel</a>

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



