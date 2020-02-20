@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    News

  </h1>

  <ol class="breadcrumb">

    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    <li><a href="#">News</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">

    <div class="col-xs-12">

      <div class="box">

        <div class="box-header">

          <h3 class="box-title">News List

          </h3>
          @permission('news-add')
          <a href="{{route('admin.news.addnews')}}" class="btn btn-primary pull-right">Add News+</a>
          @endpermission
        </div>

        <div class="box-body">





          <table id="areas_datatable" class="table table-bordered table-striped">

            <thead>

            <tr>

              <tr>

              <th>ID</th>

              <th>Title</th>

              <th>URL</th>
              <th>Description</th>


              <th>Status</th>

              <th>Action</th>

            </tr>

            </tr>

            </thead>

            <tbody>



            </tbody>



          </table>

        </div>

        <!-- /.box-body -->

      </div>

      <!-- /.box -->

    </div>

    <!-- /.col -->

  </div>

  <!-- /.row -->

</section>

@endsection

@section('custom_js')

  <script>

      $(document).ready(function () {

          var doctordatatable = $('#areas_datatable').DataTable({

              responsive: true,

              "processing": true,

              "ajax": "{{ route('admin.news.array') }}",

              "language": {

                  "emptyTable": "No News available"

              },

              "order": [[0, "desc"]],

          });

          doctordatatable.columns([0]).visible(false, false);

      }); // end of document ready

  </script>

  @endsection

