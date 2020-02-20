@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Add Menu

    <!-- <small>advanced tables</small> -->

  </h1>

  <ol class="breadcrumb">

    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    <li><a href="{{ route('admin.menu') }}">Menus</a></li>

    <li><a href="#">Add Menu</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">

    <div class="col-md-6 col-xs-12">

      <div class="box">

        <form action="{{ route('admin.menu.storemenu') }}" method="post">

        @csrf

        <div class="box-body">

          

          <div class="form-group">

                <label for="exampleInputEmail1">Page</label>

                <select class="form-control" required="" name="page">

                  <option class="form-control" value="">Select Page</option>

                  @foreach($pages as $page)

                  <option class="form-control" value="{{$page->id}}">{{$page->title}}</option>

                  @endforeach

                </select>

          </div>



          <div class="form-group">

                <label for="exampleInputEmail1">Name</label>

                <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Enter Name" required="">

          </div>

          <div class="form-group">

                <label for="exampleInputEmail1">Tamil Name</label>

                <input type="text" value="{{ old('tamilname') }}" name="tamilname" class="form-control" placeholder="Enter Name" >

          </div>



           <div class="form-group">

                <label for="exampleInputEmail1">Sort</label>
                <select class="form-control" required="" name="sort" >
                  <option disabled selected value="" class="form-control" value="">Select Sort</option>
                    @for ($i = 0; $i <= 30; $i++)
                      <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

          </div>



          <div class="form-group">

                <label for="exampleInputEmail1">URL</label>

                <input type="url" value="{{ env('APP_URL') }}" name="url" class="form-control" placeholder="https://example.com" required="" readonly="">

          </div>



        </div>

        <div class="box-footer">

          <button type="submit" class="btn btn-primary">Submit</button>

          <a href="{{ route('admin.menu') }}" class="btn btn-default">Cancel</a>

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



