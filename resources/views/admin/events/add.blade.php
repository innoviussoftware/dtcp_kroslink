@extends('layouts.admin')

@section('content')
<section class="content-header">
  <h1>
    Add Events
    <!-- <small>advanced tables</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route('admin.events') }}">Events</a></li>
    <li><a href="#">Add Events</a></li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-8 col-xs-10">
      <div class="box">
        <form action="{{ route('admin.events.storeevents') }}" method="post">
        @csrf
        <!-- /.box-header -->
        <div class="box-body">
          
          <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Enter Name">
          </div>

          <div class="form-group">
                <label for="exampleInputEmail1">Date</label>
                <input type="text" value="{{ old('name') }}" name="eventdate" class="form-control startdate" placeholder="Enter Date">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea name="content"rows="5" cols="40" id="content" class="form-control tinymce-txt" placeholder=""></textarea>
          </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="{{ route('admin.events') }}" class="btn btn-default">Cancel</a>
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
  $(".startdate").datepicker({
        numberOfMonths: 2,
        format: 'yyyy/mm/dd',
        startDate:'+0d',
  });

  </script>
@endsection

