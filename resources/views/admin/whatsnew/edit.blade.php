@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Edit Whats'New

    <!-- <small>advanced tables</small> -->

  </h1>

  <ol class="breadcrumb">

    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    <li><a href="{{ route('admin.events') }}">Whats'New</a></li>

    <li><a href="#">Edit</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">

    <div class="col-md-8 col-xs-10">

      <div class="box">

        <form action="{{ route('admin.whatsnew.update',$Whatsnew->id) }}" method="post">

        @csrf

        @method('PATCH')



        <div class="box-header">

          <h3 class="box-title">Edit Whats'New</h3>

        </div>

        <!-- /.box-header -->

        <div class="box-body">

          

          <div class="form-group">

                <label for="exampleInputEmail1">Title</label>

                <input type="text" value="{{ $Whatsnew->title }}" name="title" class="form-control" placeholder="Enter Title" required="">

          </div>

           <div class="form-group">

                <label for="exampleInputEmail1">Tamil Title</label>

                <input type="text" value="{{ $Whatsnew->tamil_title }}" name="tamiltitle" class="form-control" placeholder="Enter Tamil Title">

          </div>



          <div class="form-group">

                <label for="exampleInputEmail1">Url</label>

                <input type="url" value="{{ $Whatsnew->url }}" name="url" class="form-control startdate" placeholder="Enter Url" required="">

          </div>



          @if($count >= '3')

          <div class="form-group">

                <label>Type</label>

                <div class="radio">

                    <label><input type="radio" name="type"  value="1" <?php if($Whatsnew->flag=='1'){ echo 'checked';}?>>New</label>

                </div>

                <div class="radio">

                    <label><input type="radio" name="type" value="2" readonly <?php if($Whatsnew->flag=='2'){ echo 'checked';}?>>Important</label>

                </div>

          </div>

          @else

          <div class="form-group">

                <label>Type</label>

                <div class="radio">

                    <label><input type="radio" name="type"  value="1" <?php if($Whatsnew->flag=='1'){ echo 'checked';}?> >New</label>

                </div>

                <div class="radio">

                    <label><input type="radio" name="type" value="2" <?php if($Whatsnew->flag=='2'){ echo 'checked';}?>>Important</label>

                </div>

          </div>

          @endif

          



        </div>

        <!-- /.box-body -->

        <div class="box-footer">

          <button type="submit" class="btn btn-primary">Update</button>

          <a href="{{ route('admin.whatsnew') }}" class="btn btn-default">Cancel</a>

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





