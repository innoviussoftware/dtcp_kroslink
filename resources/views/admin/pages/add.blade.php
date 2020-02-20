@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Add Page

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

        <form action="{{route('admin.pages.storepages')}}" method="post">

        @csrf



        <div class="box-header">

          <h3 class="box-title">Add Page</h3>

        </div>

        <!-- /.box-header -->

        <div class="box-body">

          

          <div class="form-group">

                <label for="exampleInputEmail1">Title</label>

                <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="Enter title" required="">

          </div>

          <div class="form-group">

                <label for="exampleInputEmail1">Tamil Title</label>

                <input type="text" value="{{ old('tamiltitle') }}" name="tamiltitle" class="form-control" placeholder="Enter title">

          </div>



          <div class="form-group">

                <label for="exampleInputEmail1">External URL</label>

                <input type="url" value="{{old('url')}}" name="externalurl" class="form-control" placeholder="Enter External url">

          </div>



          



          <div class="form-group">

                <label for="exampleInputEmail1">Meta Target</label>

                <input type="text" value="{{ old('metatarget') }}" name="metatarget" class="form-control" placeholder="Enter meta target" >

          </div>



          <div class="form-group">

                <label for="exampleInputEmail1">Meta Details</label>

                <input type="text" value="{{ old('metadetails') }}" name="metadetails" class="form-control" placeholder="Enter meta details">

          </div>



          <div class="form-group">

                <label for="exampleInputEmail1">Meta Keyword</label>

                <input type="text" value="{{ old('metakeyword') }}" name="metakeyword" class="form-control" placeholder="Enter meta keyword" >

          </div>



          <div class="form-group">

            <label for="exampleInputEmail1">Content</label>

            <textarea name="content"rows="5" cols="40" id="content" class="form-control tinymce-txt" placeholder=""></textarea>

          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Tamil Content</label>

            <textarea name="tamilcontent" rows="5" cols="40" id="tamilcontent" class="form-control tinymce-txt" placeholder=""></textarea>

          </div>



        </div>

        <!-- /.box-body -->

        <div class="box-footer">

          <button type="submit" class="btn btn-primary">Submit</button>

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

        CKEDITOR.replace('content');
        CKEDITOR.replace('tamilcontent');

     });

     

     //Flat red color scheme for iCheck

        $('input[type="radio"]').iCheck({

          radioClass: 'iradio_flat-red'

        });

  </script>

@endsection

