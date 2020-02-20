@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Edit News

    <!-- <small>advanced tables</small> -->

  </h1>

  <ol class="breadcrumb">

    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    <li><a href="{{ route('admin.news') }}">News</a></li>

    <li><a href="#">Edit</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">

    <div class="col-md-8 col-xs-8">

      <div class="box">

        <form action="{{ route('admin.news.update',$news->id) }}" method="post">

        @csrf

        @method('PATCH')



        <div class="box-header">

          <h3 class="box-title">Edit News</h3>

        </div>

        <!-- /.box-header -->

        <div class="box-body">

          

          <div class="form-group">

                <label for="exampleInputEmail1">Title</label>

                <input type="text" value="{{ $news->title }}" name="name" class="form-control" placeholder="">

          </div>

          <div class="form-group">

                <label for="exampleInputEmail1">Tamil Title</label>

                <input type="text" value="{{ $news->tamil_title }}" name="tamilname" class="form-control" placeholder="Enter Tamil Name">

          </div>



          <div class="form-group">

                <label for="exampleInputEmail1">Url</label>

                <input type="text" value="{{ $news->url }}" name="url" class="form-control" placeholder="Enter Url">

          </div>



          <div class="form-group">

            <label for="exampleInputEmail1">Description</label>

            <textarea name="content"rows="5" cols="40" id="content" class="form-control tinymce-txt" placeholder="">{{$news->description}}</textarea>

          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Tamil Description</label>

            <textarea name="tamilcontent"rows="5" cols="40" id="tamilcontent" class="form-control tinymce-txt" placeholder="">{{$news->tamil_content}}</textarea>
            
          </div>



        </div>

        <!-- /.box-body -->

        <div class="box-footer">

          <button type="submit" class="btn btn-primary">Update</button>

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

    $('input[type="radio"]').iCheck({

          radioClass: 'iradio_flat-red'

    });

  </script>

@endsection

