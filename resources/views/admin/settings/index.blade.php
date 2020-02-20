@extends('layouts.admin')

@section('content')
<section class="content-header">
  <h1>
    Settings
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">Settings</a></li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Settings List
          </h3>
          <a href="{{route('admin.setting.addsetting')}}" class="btn btn-primary pull-right">Add Settings+</a>
        </div>
        <div class="box-body">


          <table id="areas_datatable" class="table table-bordered table-striped">
            <thead>
            <tr>
              <tr>
              <th>ID</th>
              <th>Address</th>
              <th>Number</th>
              <th>Fax</th>
              <th>Email</th>
              <th>Twitter</th>
              <th>Facebook</th>
              <th>Instrgram</th>
              <th>Linkedln</th>
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
              "ajax": "{{ route('admin.setting.array') }}",
              "language": {
                  "emptyTable": "No Settings available"
              },
              "order": [[0, "desc"]],
          });
          doctordatatable.columns([0]).visible(false, false);
      }); // end of document ready
  </script>
  @endsection
