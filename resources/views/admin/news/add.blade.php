@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Add News

    <!-- <small>advanced tables</small> -->

  </h1>

  <ol class="breadcrumb">

    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    <li><a href="{{ route('admin.news') }}">News</a></li>

    <li><a href="#">Add News</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">

    <div class="col-md-8 col-xs-8">

      <div class="box">

        <form action="{{ route('admin.news.storenews') }}" method="post">

        @csrf

        <!-- /.box-header -->

        <div class="box-body">

          

          <div class="form-group">

                <label for="exampleInputEmail1">Title</label>

                <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Enter Name" required="">

          </div>

          <div class="form-group">

                <label for="exampleInputEmail1">Tamil Title</label>

                <input type="text" value="{{ old('tamilname') }}" name="tamilname" class="form-control" placeholder="Enter Tamil Name">

          </div>



          <div class="form-group">

                <label for="exampleInputEmail1">Url</label>

                <input type="url" value="{{ old('url') }}" name="url" class="form-control" placeholder="Enter Url">

          </div>



          <div class="form-group">

            <label for="exampleInputEmail1">Description</label>

            <textarea name="content"rows="5" cols="40" id="content" class="form-control tinymce-txt" placeholder=""></textarea>

          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Tamil Description</label>

            <textarea name="tamilcontent"rows="5" cols="40" id="tamilcontent" class="form-control tinymce-txt" placeholder=""></textarea>

          </div>



        </div>

        <!-- /.box-body -->

        <div class="box-footer">

          <button type="submit" class="btn btn-primary">Submit</button>

          <a href="{{ route('admin.news') }}" class="btn btn-default">Cancel</a>

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
        CKEDITOR.replace('tamilcontent');

     });

     

     //Flat red color scheme for iCheck

        $('input[type="radio"]').iCheck({

          radioClass: 'iradio_flat-red'

        });

  </script>

@endsection

