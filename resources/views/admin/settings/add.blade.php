@extends('layouts.admin')



@section('content')

<section class="content-header">

  <h1>

    Add Settings

    <!-- <small>advanced tables</small> -->

  </h1>

  <ol class="breadcrumb">

    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    <li><a href="{{ route('admin.setting') }}">Settings</a></li>

    <li><a href="#">Add Settings</a></li>

  </ol>

</section>



<section class="content">

  <div class="row">

    <div class="col-md-8 col-xs-8">

      <div class="box">

        <form action="{{ route('admin.setting.storesetting') }}" method="post">

        @csrf

        <!-- /.box-header -->

        <div class="box-body" id="General_information">

          

          

          <ul class="nav nav-tabs" style="text-align: left;">

              <li class="active"><a href="#first" data-toggle="tab" id="first_tab">General</a></li>

              <li><a href="#second" data-toggle="tab" id="third_tab">Logo</a></li>

              <li><a href="#third" data-toggle="tab" id="second_tab">Social</a></li>

              <li><a href="#fourth" data-toggle="tab" id="fourth_tab">Content</a></li>

          </ul>

    

          <div class="tab-content">



              <div id="first" class="tab-pane fade in active">

                  <div class="box-body" id="General_information">



                        <div class="form-group">

                              <label for="exampleInputEmail1">Title</label>

                              <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="Enter title">

                        </div>

                        <div class="form-group">

                              <label for="exampleInputEmail1">Tamil Title</label>

                              <input type="text" value="{{ old('tamiltitle') }}" name="tamiltitle" class="form-control" placeholder="Enter title">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Description</label>

                              <input type="text" value="{{ old('number') }}" name="description" class="form-control" placeholder="Enter description" >

                        </div>

                         <div class="form-group">

                              <label for="exampleInputEmail1">Tamil Description</label>

                              <input type="text" value="{{ old('number') }}" name="tamildescription" class="form-control" placeholder="Enter description" >

                        </div>



                        <div class="form-group">

                            <label for="exampleInputEmail1">Address</label>

                            <textarea name="tamiladdress" class="form-control tinymce-txt" placeholder="Enter Address" ></textarea>

                        </div>

                        <div class="form-group">

                            <label for="exampleInputEmail1">Tamil Address</label>

                            <textarea name="address" class="form-control tinymce-txt" placeholder="Enter Address"></textarea>

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Contact Number</label>

                              <input type="text" value="{{ old('number') }}" name="number" class="form-control" placeholder="Enter Contact Number" minlength="10" maxlength="10">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Fax</label>

                              <input type="text" value="{{ old('fax') }}" name="fax" class="form-control" placeholder="Enter Fax">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Email Address</label>

                              <input type="email" value="{{ old('email_address') }}" name="email_address" class="form-control" placeholder="Enter Email Address" >

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Copyright</label>

                              <input type="text" value="{{ old('number') }}" name="copyright" class="form-control" placeholder="Enter Copyright">

                        </div>

                  </div>

              </div>



              <div id="second" class="tab-pane fade in">

                  <div class="box-body" id="General_information">

                        <div class="form-group">

                            <label for="exampleInputEmail1">Primary Logo</label>

                            <input type="file" name="primarylogo" class="form-control">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Secondary Logo</label>

                              <input type="file" name="secondarylogo" class="form-control">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Fav Icon</label>

                              <input type="file" name="favicon" class="form-control">

                        </div>

                  </div>

              </div>

                

              <div id="third" class="tab-pane fade in">

                  <div class="box-body" id="General_information">

                        



                        <div class="form-group">

                              <label for="exampleInputEmail1">Facebook</label>

                              <input type="url" value="{{ old('facebook_url') }}" name="facebook_url" class="form-control" placeholder="Enter Facebook URL">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Twitter</label>

                              <input type="url" value="{{ old('twitter_url') }}" name="twitter_url" class="form-control" placeholder="Enter Twitter URL">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Linkedin</label>

                              <input type="url" value="{{ old('instragram_url') }}" name="linkedin_url" class="form-control" placeholder="Enter Linkedin URL">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Pinterest</label>

                              <input type="url" value="{{ old('pinterest_url') }}" name="pinterest_url" class="form-control" placeholder="Enter Pinterest URL">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Google Plus</label>

                              <input type="url" value="{{ old('googleplus_url') }}" name="googleplus_url" class="form-control" placeholder="Enter Google Plus URL">

                        </div>



                        <div class="form-group">

                              <label for="exampleInputEmail1">Youtube</label>

                              <input type="url" value="{{ old('youtube_url') }}" name="youtube_url" class="form-control" placeholder="Enter Youtube URL">

                        </div>

                  </div>

              </div>

              <div id="fourth" class="tab-pane fade in">
                  <div class="box-body" id="General_information">
                        <div class="form-group">

                              <label for="exampleInputEmail1">Details_content</label>

                              <textarea class="form-control" name="engdetails" rows="8" placeholder="Enter Details">{{ $settings->content }}</textarea>
                        </div>

                        <div class="form-group">

                              <label for="exampleInputEmail1">Tamil_content</label>

                              <textarea class="form-control" name="tamildetails" rows="8" placeholder="Enter Tamil Details">{{ $settings->footer_content }}</textarea>
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

