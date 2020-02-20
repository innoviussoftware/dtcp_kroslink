@extends('layouts.admin')

@section('content')

<section class="content-header">
  <h1>
    Add Role
    <!-- <small>advanced tables</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">Role</a></li>
    <li><a href="#">Add</a></li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-8 col-xs-8">
      <div class="box">
        <form action="{{route('admin.roles.storeroles')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="box-header">
          <h3 class="box-title">Add Role</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Enter Role" required="">
          </div>

          <div class="form-group">
                <!-- <label>Permissions</label> -->
                <!-- <button type="button"   class="btn btn-primary" style="float: right;" id="select_all">Select All</button>
                 <button type="button"  class="btn btn-danger" style="display: none;float: right;" id="remove_all">Remove All</button>
                  <select id="parent_filter_select2" class="form-control select2 parent_filter_select2 pull-right " name="permission[]" id="building" required data-placeholder="Select Permissions" multiple="multiple">
                  @foreach($permission as $p)
                    <option value="{{ $p->id }}" {{ ($p->id == old('building_id')) ? "selected" : "" }} >{{ $p->name }}</option>
                  @endforeach
                  </select> -->
          </div>
         
          <div class="custom-control custom-checkbox">
            
              <div class="row">
                  <div class="col-md-3">
                      <label class="form-group">Permissions</label>
                  </div>
                  <div class="col-md-2">
                      <label class="form-group">Add</label>
                  </div>
                  <div class="col-md-2">
                      <label class="form-group">Edit</label>
                  </div>
                   <div class="col-md-2">
                      <label class="form-group">Delete</label>
                  </div>
                  <div class="col-md-2">
                      <label class="form-group">View</label>
                  </div>
              </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Page</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="page-add" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="page-edit" name="permission[]">
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="page-delete" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="page-view" name="permission[]">
                    </div>
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Menu</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="menu-add" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="menu-edit" name="permission[]">
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="menu-delete" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="menu-view" name="permission[]">
                    </div>
                   
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Submenu</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="submenu-add" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="submenu-edit" name="permission[]">
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="submenu-delete" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="submenu-view" name="permission[]">
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Slider</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="slider-add" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="slider-edit" name="permission[]">
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="slider-delete" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="slider-view" name="permission[]">
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Gallery</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="gallery-add" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="gallery-edit" name="permission[]">
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="gallery-delete" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="gallery-view" name="permission[]">
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group">
              <div class="row">
                    <div class="col-md-3">
                        <label>Partners Logo</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="logo-add" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="logo-edit" name="permission[]">
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="logo-delete" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="logo-view" name="permission[]">
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>News</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="news-add" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="news-edit" name="permission[]">
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="news-delete" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="news-view" name="permission[]">
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>What's New</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="whatsnew-add" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="whatsnew-edit" name="permission[]">
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="whatsnew-delete" name="permission[]"> 
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="whatsnew-view" name="permission[]">
                    </div>
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Settings</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="settings-add" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="settings-edit" name="permission[]">
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="settings-delete" name="permission[]"> 
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="settings-view" name="permission[]">
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>File</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="file-add" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="file-edit" name="permission[]">
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="file-delete" name="permission[]"> 
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="file-view" name="permission[]">
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Contacts</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="contacts-add" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="contacts-edit" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="contacts-delete" name="permission[]"> 
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="contacts-view" name="permission[]">
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Logs</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="logs-add" name="permission[]">
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="logs-edit" name="permission[]">
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="logs-delete" name="permission[]"> 
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="logs-view" name="permission[]">
                    </div>
                    
                </div>
          </div>

              
      </div>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
           <a href="{{ route('admin.roles') }}" class="btn btn-default">Cancel</a>
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
<script src="{{asset('public/admin_assets/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
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

          $('#parent_filter_select2').select2({
            placeholder: 'Select'
          });

          $('#select_all').click(function ()
          {
                $('#parent_filter_select2 > option').prop('selected', 'selected');
                $('#parent_filter_select2').trigger('change');
                $('#remove_all').show();
                $(this).hide();
          });
    
          $('#remove_all').click(function ()
          {
                $('#parent_filter_select2 > option').prop('selected', false);
                $('#parent_filter_select2').trigger('change');
                $('#select_all').show();
                $(this).hide();
          });

  </script>
@endsection
