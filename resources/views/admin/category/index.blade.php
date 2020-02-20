@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Gallery Category

  </h1>

  <ol class="breadcrumb">

    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

    <li><a href="#">Gallery Category</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">

    <div class="col-xs-12">

      <div class="box">

        <div class="box-header">

          <h3 class="box-title">Gallery Category List</h3>

          @permission('category-add')
          <a href="{{ route('admin.category.addcategory') }}" class="btn btn-primary pull-right">Add Category+</a>
          @endpermission
        </div>

        <!-- /.box-header -->

        <div class="box-body">





          <table id="areas_datatable" class="table table-bordered table-striped">

            <thead>

            <tr>

              <th>ID</th>

              <th>Name</th>

              <th>Activate</th>

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

              "ajax": "{{ route('admin.category.array') }}",

              "language": {

                  "emptyTable": "No category available"

              },

              "order": [[0, "desc"]],

          });

          doctordatatable.columns([0]).visible(false, false);

      }); // end of document ready

  </script>

  @endsection

