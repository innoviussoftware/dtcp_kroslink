@extends('layouts.admin')

@section('content')
<section class="content-header">
  <h1>
    Permission
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Permission</a></li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Permission List</h3>
          <a href="{{ route('admin.permissions.addpermissions') }}" class="btn btn-primary pull-right">Add Permission+</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">


          <table id="areas_datatable" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Action</th>
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
              "ajax": "{{ route('admin.permissions.array') }}",
              "language": {
                  "emptyTable": "No permission available"
              },
              "order": [[0, "desc"]],
          });
          doctordatatable.columns([0]).visible(false, false);
      });
  </script>
  @endsection
