@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Useful Links

  </h1>

  <ol class="breadcrumb">

    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

    <li><a href="#">Useful Links</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">

    <div class="col-xs-12">

      <div class="box">

        <div class="box-header">

          <h3 class="box-title">Useful Links List</h3>
          
          @permission('logo-add')
          <a href="{{ route('admin.partners.addpartners') }}" class="btn btn-primary pull-right">Add Useful Links+</a>
          @endpermission

        </div>

        <!-- /.box-header -->

        <div class="box-body">





          <table id="areas_datatable" class="table table-bordered table-striped">

            <thead>

            <tr>

              <th>ID</th>

              <th>Image</th>

              <th>Link</th>

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

              "ajax": "{{ route('admin.partners.array') }}",

              "language": {

                  "emptyTable": "No Useful Links available"

              },

              "order": [[0, "desc"]],

          });

          doctordatatable.columns([0]).visible(false, false);

      }); // end of document ready

  </script>

  @endsection

