@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Sub Menu

  </h1>

  <ol class="breadcrumb">

    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

    <li><a href="#">Sub Menu</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">

    <div class="col-xs-12">

      <div class="box">

        <div class="box-header">

          <h3 class="box-title">Sub Menu List</h3>

          @permission('submenu-add')
          <a href="{{ route('admin.submenu.addsubmenu') }}" class="btn btn-primary pull-right">Add Sub Menu+</a>
          @endpermission

        </div>

        <!-- /.box-header -->

        <div class="box-body">





          <table id="cities_datatable" class="table table-bordered table-striped">

            <thead>

            <tr>

              <th>ID</th>

              <th>Name</th>

              <th>URL</th>

              <th>Menu Name</th>

              <th>Page</th>

              <th>Sort</th>

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

          var doctordatatable = $('#cities_datatable').DataTable({

              responsive: true,

              "processing": true,

              "ajax": "{{ route('admin.submenu.array') }}",

              "language": {

                  "emptyTable": "No Sub Menu available"

              },

              "order": [[0, "desc"]],

          });

          doctordatatable.columns([0]).visible(false, false);

      }); // end of document ready

  </script>

  @endsection

