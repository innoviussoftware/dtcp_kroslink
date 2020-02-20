@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Edit Settings

    <!-- <small>advanced tables</small> -->

  </h1>

  <ol class="breadcrumb">

    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    <li><a href="{{ route('admin.setting') }}">Settings</a></li>

    <li><a href="#">Edit Settings</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">

    <div class="col-md-8 col-xs-8">

      <div class="box">

        <form action="{{ route('admin.setting.update',$settings->id) }}" method="post">

        @csrf

        @method('PATCH')

        <!-- /.box-header -->

        <div class="box-body" id="General_information">

          

          <input type="hidden" name="primarylogo" value="{{$settings->primary_logo}}">

          <input type="hidden" name="secondarylogo" value="{{$settings->secondary_logo}}">

          <input type="hidden" name="favicon" value="{{$settings->favicon}}">

          <ul class="nav nav-tabs" style="text-align: left;">

              <li class="active"><a href="#first" data-toggle="tab" id="first_tab">General</a></li>

              <li><a href="#second" data-toggle="tab" id="third_tab">Logo</a></li>

              <li><a href="#third" data-toggle="tab" id="second_tab">Social</a></li>

              <li><a href="#fourth" data-toggle="tab" id="fourth_tab">Homepage Content</a></li>

              <li><a href="#fifth" data-toggle="tab" id="fifth_tab">Footer Content</a></li>

          </ul>

    

          <div class="tab-content">



              <div id="first" class="tab-pane fade in active">

                  <div class="box-body" id="General_information">



                        <div class="form-group">

                              <label for="exampleInputEmail1">Title</label>

                              <input type="text" value="{{ $settings->title }}" name="title" class="form-control" placeholder="Enter title">

                        </div>

                        <div class="form-group">

                              <label for="exampleInputEmail1">Tamil Title</label>

                              <input type="text" value="{{ $settings->tamil_title }}" name="tamiltitle" class="form-control" placeholder="Enter tamil title">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Description</label>

                              <input type="text" value="{{ $settings->description }}" name="description" class="form-control" placeholder="Enter description" >

                        </div>

                        <div class="form-group">

                              <label for="exampleInputEmail1">Tamil Description</label>

                              <input type="text" value="{{ $settings->tamil_content }}" name="tamildescription" class="form-control" placeholder="Enter description" >

                        </div>



                        <div class="form-group">

                            <label for="exampleInputEmail1">Address</label>

                            <textarea name="address" class="form-control tinymce-txt" placeholder="Enter Address">{{$settings->address}}</textarea>

                        </div>

                        <div class="form-group">

                            <label for="exampleInputEmail1">Tamil Address</label>

                            <textarea name="tamiladdress" class="form-control tinymce-txt" placeholder="Enter Address">{{$settings->tamil_address}}</textarea>

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Contact Number</label>

                              <input type="text" value="{{ $settings->contact_number }}" name="number" class="form-control" placeholder="Enter Contact Number" minlength="10" maxlength="10">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Fax</label>

                              <input type="text" value="{{ $settings->fax }}" name="fax" class="form-control" placeholder="Enter Fax">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Email Address</label>

                              <input type="email" value="{{ $settings->email_id }}" name="email_address" class="form-control" placeholder="Enter Email Address">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Copyright</label>

                              <input type="text" value="{{ $settings->copyright }}" name="copyright" class="form-control" placeholder="Enter Copyright">

                        </div>

                  </div>

              </div>



              <div id="second" class="tab-pane fade in">

                  <div class="box-body" id="General_information">

                        <div class="form-group">

                            <label for="exampleInputEmail1">Primary Logo</label>

                            <input type="file" name="primarylogo" class="form-control">

                            @if(isset($settings->primary_logo))

                            <div class="form-group">

                                 <img src="{{env('APP_URL_STORAGE').$settings->primary_logo}}" width="550" height="150" class="img-fluid">

                            </div>

                            @endif

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Secondary Logo</label>

                              <input type="file" name="secondarylogo" class="form-control">

                              @if(isset($settings->secondary_logo))

                              <div class="form-group">

                                 <img src="{{env('APP_URL_STORAGE').$settings->secondary_logo}}" width="550" height="150" class="img-fluid">

                            </div>

                            @endif

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Fav Icon</label>

                              <input type="file" name="favicon" class="form-control">

                              @if(isset($settings->favicon))

                              <div class="form-group">

                                 <img src="{{env('APP_URL_STORAGE').$settings->favicon}}" width="550" height="150" class="img-fluid">

                              </div>

                              @endif

                        </div>

                  </div>

              </div>

                

              <div id="third" class="tab-pane fade in">

                  <div class="box-body" id="General_information">

                        



                        <div class="form-group">

                              <label for="exampleInputEmail1">Facebook</label>

                              <input type="url" value="{{ $settings->facebook }}" name="facebook_url" class="form-control" placeholder="Enter Facebook URL">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Twitter</label>

                              <input type="url" value="{{ $settings->twitter }}" name="twitter_url" class="form-control" placeholder="Enter Twitter URL">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Linkedin</label>

                              <input type="url" value="{{ $settings->linkedin }}" name="linkedin_url" class="form-control" placeholder="Enter Linkedin URL">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Pinterest</label>

                              <input type="url" value="{{ $settings->pinterest }}" name="pinterest_url" class="form-control" placeholder="Enter Pinterest URL">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Google Plus</label>

                              <input type="url" value="{{ $settings->google_plus }}" name="googleplus_url" class="form-control" placeholder="Enter Google Plus URL">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Youtube</label>

                              <input type="url" value="{{ $settings->youtube }}" name="youtube_url" class="form-control" placeholder="Enter Youtube URL">

                        </div>

                  </div>

              </div>

              <div id="fourth" class="tab-pane fade in">
                  <div class="box-body" id="General_information">
                        <div class="form-group">

                              <label for="exampleInputEmail1">Details_content</label>

                              <textarea class="form-control" name="engdetails" rows="8" placeholder="Enter Details">{{ $settings->details }}</textarea>
                        </div>

                        <div class="form-group">

                              <label for="exampleInputEmail1">Tamil_content</label>

                              <textarea class="form-control" name="tamildetails" rows="8" placeholder="Enter Tamil Details">{{ $settings->tamil_details }}</textarea>
                        </div>
                  </div>
              </div>

              <div id="fifth" class="tab-pane fade in">
                  <div class="box-body" id="General_information">
                        <div class="form-group">

                              <label for="exampleInputEmail1">Details_content</label>

                              <textarea class="form-control" name="engfooterdetails" rows="8" placeholder="Enter Details">{{ $settings->footer_details }}</textarea>
                        </div>

                        <div class="form-group">

                              <label for="exampleInputEmail1">Tamil_content</label>

                              <textarea class="form-control" name="tamilfooterdetails" rows="8" placeholder="Enter Tamil Details">{{ $settings->footer_tamildetails }}</textarea>
                        </div>
                  </div>
              </div>



              



              

            </div>



        </div>

        <!-- /.box-body -->

        <div class="box-footer">

          <button type="submit" class="btn btn-primary">Submit</button>

          <a href="{{ route('admin.news') }}" class="btn btn-default">Cancel</a>

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

<script src="{{ asset('public/admin_assets/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>

<script src="{{{ asset('public/admin_assets/plugins/ckeditor/ckeditor.js') }}}" type="text/javascript"></script>

<script type="text/javascript">

    $(function () {

      // Replace the <textarea id="editor1"> with a CKEditor

      // instance, using default configuration.

        CKEDITOR.replace('content');

     });

     

     //Flat red color scheme for iCheck

        $('input[type="radio"]').iCheck({

          radioClass: 'iradio_flat-red'

        });

  </script>

@endsection

