@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Menus

  </h1>

  <ol class="breadcrumb">

    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    <li><a href="#">Menus</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">

    <div class="col-xs-12">

      <div class="box">

        <div class="box-header">

          <h3 class="box-title">Menus List

          </h3>
          
          @permission('menu-add')
          <a href="{{route('admin.menu.addmenu')}}" class="btn btn-primary pull-right">Add Menu+</a>
          @endpermission

        </div>

        <div class="box-body">





          <table id="areas_datatable" class="table table-bordered table-striped">

            <thead>

            <tr>

              <tr>

              <th>ID</th>

              <th>Name</th>

              <th>Page</th>

              <th>URL</th>

              <th>Sort</th>

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

              "ajax": "{{ route('admin.menu.array') }}",

              "language": {

                  "emptyTable": "No Menu available"

              },

              "order": [[0, "desc"]],

          });

          doctordatatable.columns([0]).visible(false, false);

      }); // end of document ready

  </script>

  @endsection

