@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Whats'New

  </h1>

  <ol class="breadcrumb">

    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    <li><a href="#">What's new</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">

    <div class="col-xs-12">

      <div class="box">

        <div class="box-header">

          <h3 class="box-title">What's new List

          </h3>
          @permission('whatsnew-add')
          <a href="{{route('admin.whatsnew.addwhatsnew')}}" class="btn btn-primary pull-right">Add What's new+</a>
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

              "ajax": "{{ route('admin.whatsnew.array') }}",

              "language": {

                  "emptyTable": "No Whats New available"

              },

              "order": [[0, "desc"]],

          });

          doctordatatable.columns([0]).visible(false, false);

      }); // end of document ready

  </script>

  @endsection

