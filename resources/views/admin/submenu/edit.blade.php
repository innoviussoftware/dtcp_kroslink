@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Edit Sub Menu

    <!-- <small>advanced tables</small> -->

  </h1>

  <ol class="breadcrumb">

    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    <li><a href="#">Sub Menu</a></li>

    <li><a href="#">Edit</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">

    <div class="col-md-8 col-xs-8">

      <div class="box">

        <form action="{{route('admin.submenu.update',$submenu->id)}}" method="post">

        @csrf

        @method('PATCH')

        <div class="box-header">

          <h3 class="box-title">Edit Sub Menu</h3>

        </div>

        <!-- /.box-header -->

        <div class="box-body">

          

          <div class="form-group">

                <label for="exampleInputEmail1">Page</label>

                <select class="form-control" required="" name="page" >

                  <option disabled selected value="" class="form-control" value="">Select Page</option>

                  @foreach($pages as $page)

                  <option class="form-control" value="{{$page->id}}" <?php if($page->id==$submenu->page_id){ echo 'selected';}?>>{{$page->title}}</option>

                  @endforeach

                </select>

          </div>





          <div class="form-group">

                <label for="exampleInputEmail1">Menu</label>

                <select class="form-control" required="" name="menu">

                  <option class="form-control">Select Menu</option>

                  @foreach($menu as $m)

                  <option class="form-control" value="{{$m->id}}" <?php if($m->id==$submenu->menu_id){ echo 'selected';}?>>{{$m->name}}</option>

                  @endforeach

                </select>

          </div>



          <div class="form-group">

                <label for="exampleInputEmail1">Title</label>

                <input type="text" value="{{ $submenu->name }}" name="title" class="form-control" placeholder="Enter Title" required="">

          </div>

          <div class="form-group">

                <label for="exampleInputEmail1">Tamil Title</label>

                <input type="text" value="{{ $submenu->tamil_name }}" name="tamiltitle" class="form-control" placeholder="Enter Tamil Title">

          </div>



           <div class="form-group">

                <label for="exampleInputEmail1">Sort</label>
                <select class="form-control" required="" name="sort" >
                  <option disabled selected value="" class="form-control" value="">Select Sort</option>
                    @for ($i = 0; $i <= 30; $i++)
                      <option value="{{ $i }}" <?php if($submenu->sorted==$i){ echo 'selected';}?>>{{ $i }}</option>
                    @endfor
                </select>

          </div>



          <div class="form-group">

                <label for="exampleInputEmail1">URL</label>

                <input type="url" value="{{ $submenu->url }}" name="url" class="form-control" placeholder="https://example.com" required="" readonly="">

          </div>



        </div>

        <!-- /.box-body -->

        <div class="box-footer">

          <button type="submit" class="btn btn-primary">Submit</button>

          <a href="{{route('admin.submenu')}}" class="btn btn-default">Cancel</a>

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

@section('custom_js')

<script>

$(document).ready(function (){

  $("body").on('change','#Page',function (){

    var id  = $(this).val();

    getArea(id);

  });



  function getArea(id){

    $.ajax({

      url:"{{ env('APP_URL') }}/admin/submenu/byPage/"+id,

      method:"get",

      success:function(e){

        var html = "<option value=''>Select Menu</option>";

        for(var i = 0; i < e.length; i++){

          html += "<option  value='"+e[i].id+"'>"+e[i].name+"</option>";

        }

        $("#area").html(html);

      }

    });

  }

});

</script>

@endsection



