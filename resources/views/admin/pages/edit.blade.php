@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Edit Page

    <!-- <small>advanced tables</small> -->

  </h1>

  <ol class="breadcrumb">

    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    <li><a href="#">Pages</a></li>

    <li><a href="#">Add</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">

    <div class="col-md-8 col-xs-8">

      <div class="box">

        <form action="{{route('admin.pages.update',$Pages->id)}}" method="post" enctype="multipart/form-data">
          <input type="hidden" name="bannerimagepath" value="{{$Pages->bannerimage}}">
        @csrf

       @method('PATCH')

        <div class="box-header">

          <h3 class="box-title">Edit Page</h3>

        </div>

        <!-- /.box-header -->

        <div class="box-body">

          

          <div class="form-group">

                <label for="exampleInputEmail1">Title</label>

                <input type="text" value="{{$Pages->title }}" name="title" class="form-control" placeholder="Enter title" required="">

          </div>

          <div class="form-group">

                <label for="exampleInputEmail1">Tamil Title</label>

                <input type="text" value="{{$Pages->tamil_title }}" name="tamiltitle" class="form-control" placeholder="Enter title">

          </div>

          <div class="form-group">

                <label for="exampleInputEmail1">URL</label>

                <input type="url" value="{{$Pages->external_url }}" name="externalurl" class="form-control" placeholder="Enter URL">

          </div>

          <div class="form-group">

                <label for="exampleInputEmail1">Banner Image</label>

                <input type="file" name="bannerimage" class="form-control">

          </div>

          <div class="form-group">

                <img src="{{env('APP_URL_STORAGE').$Pages->bannerimage}}" width="200" height="150" class="img-fluid">

          </div>

          <div class="form-group">

                <label for="exampleInputEmail1">Meta Target</label>

                <input type="text" value="{{$Pages->meta_target }}" name="metatarget" class="form-control" placeholder="Enter meta target" >

          </div>

          <div class="form-group">

                <label for="exampleInputEmail1">Meta Details</label>

                <input type="text" value="{{$Pages->meta_details }}" name="metadetails" class="form-control" placeholder="Enter meta details" >

          </div>

          <div class="form-group">

                <label for="exampleInputEmail1">Meta Keyword</label>

                <input type="text" value="{{$Pages->meta_keyword }}" name="metakeyword" class="form-control" placeholder="Enter meta keyword">

          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Content</label>

            <textarea name="content"rows="5" cols="40" id="contentname" class="form-control tinymce-txt" placeholder="">{{$Pages->page_content }}</textarea>

          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Tamil Content</label>

            <textarea name="tamilcontent"rows="5" cols="40" id="tamilcontentname" class="form-control tinymce-txt" placeholder="">{{$Pages->tamil_content }}</textarea>

          </div>

        </div>

        <!-- /.box-body -->

        <div class="box-footer">

          <button type="submit" class="btn btn-primary">Update</button>

          <a href="#" class="btn btn-default">Cancel</a>

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

        CKEDITOR.replace('contentname');
        CKEDITOR.replace('tamilcontentname');

     });

     

     //Flat red color scheme for iCheck

        $('input[type="radio"]').iCheck({

          radioClass: 'iradio_flat-red'

        });

  </script>

@endsection

