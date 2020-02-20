@extends('layouts.admin')

@section('content')
<section class="content-header">
  <h1>
    Edit Role
    <!-- <small>advanced tables</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route('admin.slider') }}">Roles</a></li>
    <li><a href="#">Edit</a></li>
  </ol>
</section>

<section class="content">
  <div class="row">

    <div class="col-md-10 col-xs-10">
      <div class="box">
        <form action="{{ route('admin.roles.update',$Role->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="box-header">
          <h3 class="box-title">Edit Roles</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" value="{{ $Role->name }}" name="name" class="form-control" placeholder="Enter Role" required="" readonly>
          </div>
<!-- 
          <div class="form-group">
              <label>Permissions</label>
              <button type="button"   class="btn btn-primary" style="float: right;" id="select_all">Select All</button>
                 <button type="button"  class="btn btn-danger" style="display: none;float: right;" id="remove_all">Remove All</button>
                <select id="parent_filter_select2" class="form-control select2" name="permission[]" id="building" required data-placeholder="Select Permissions" multiple="multiple">                
                @foreach($permission as $p)
                
                  <option value="{{ $p->id }}" <?php echo in_array($p->id,$per) ? "selected" : "" ?>>{{ $p->name }}</option>
                @endforeach
              </select>
             
          </div> -->

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
                  <div class="col-md-1">
                      <label class="form-group">Active</label>
                  </div>


              </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Role</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="53" name="permission[]"  <?php echo in_array(53,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="54" name="permission[]"  <?php echo in_array(54,$per) ? "checked" : "" ?>>
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="55" name="permission[]"  <?php echo in_array(55,$per) ? "checked" : "" ?>> 
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="56" name="permission[]"  <?php echo in_array(56,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="57" name="permission[]"  <?php echo in_array(57,$per) ? "checked" : "" ?>>
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Page</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="1" name="permission[]" <?php echo in_array(1,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="2" name="permission[]" <?php echo in_array(2,$per) ? "checked" : "" ?>>
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="3" name="permission[]" <?php echo in_array(3,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="4" name="permission[]"  <?php echo in_array(4,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="58" name="permission[]"  <?php echo in_array(58,$per) ? "checked" : "" ?>>
                    </div>
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Menu</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="5" name="permission[]"  <?php echo in_array(5,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="6" name="permission[]"  <?php echo in_array(6,$per) ? "checked" : "" ?>>
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="7" name="permission[]"  <?php echo in_array(7,$per) ? "checked" : "" ?>>
                    </div>
                   
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="8" name="permission[]"  <?php echo in_array(8,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="59" name="permission[]"  <?php echo in_array(59,$per) ? "checked" : "" ?>>
                    </div>
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Submenu</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="9" name="permission[]"  <?php echo in_array(9,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="10" name="permission[]"  <?php echo in_array(10,$per) ? "checked" : "" ?>>
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="11" name="permission[]"  <?php echo in_array(11,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="12" name="permission[]"  <?php echo in_array(12,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="60" name="permission[]"  <?php echo in_array(60,$per) ? "checked" : "" ?>>
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Slider</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="13" name="permission[]"  <?php echo in_array(13,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="14" name="permission[]"  <?php echo in_array(14,$per) ? "checked" : "" ?>>
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="16" name="permission[]"  <?php echo in_array(16,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="15" name="permission[]"  <?php echo in_array(15,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="61" name="permission[]"  <?php echo in_array(61,$per) ? "checked" : "" ?>>
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Gallery</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="17" name="permission[]"  <?php echo in_array(17,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="18" name="permission[]"  <?php echo in_array(18,$per) ? "checked" : "" ?>>
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="20" name="permission[]"  <?php echo in_array(20,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="19" name="permission[]"  <?php echo in_array(19,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="62" name="permission[]"  <?php echo in_array(62,$per) ? "checked" : "" ?>>
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group">
              <div class="row">
                    <div class="col-md-3">
                        <label>Useful Links</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="21" name="permission[]"  <?php echo in_array(21,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="22" name="permission[]"  <?php echo in_array(22,$per) ? "checked" : "" ?>>
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="24" name="permission[]"  <?php echo in_array(24,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="23" name="permission[]"  <?php echo in_array(23,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="63" name="permission[]"  <?php echo in_array(63,$per) ? "checked" : "" ?>>
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>News</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="25" name="permission[]"  <?php echo in_array(25,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="26" name="permission[]"  <?php echo in_array(26,$per) ? "checked" : "" ?>>
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="28" name="permission[]"  <?php echo in_array(28,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="27" name="permission[]"  <?php echo in_array(27,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="64" name="permission[]"  <?php echo in_array(64,$per) ? "checked" : "" ?>>
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>What's New</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="29" name="permission[]"  <?php echo in_array(29,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="30" name="permission[]"  <?php echo in_array(30,$per) ? "checked" : "" ?>>
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="31" name="permission[]"  <?php echo in_array(31,$per) ? "checked" : "" ?>> 
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="32" name="permission[]"  <?php echo in_array(32,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="65" name="permission[]"  <?php echo in_array(65,$per) ? "checked" : "" ?>>
                    </div>
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Settings</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="33" name="permission[]"  <?php echo in_array(33,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="34" name="permission[]"  <?php echo in_array(34,$per) ? "checked" : "" ?>>
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="35" name="permission[]"  <?php echo in_array(35,$per) ? "checked" : "" ?>> 
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="36" name="permission[]"  <?php echo in_array(36,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="66" name="permission[]"  <?php echo in_array(66,$per) ? "checked" : "" ?>>
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>File</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="37" name="permission[]"  <?php echo in_array(37,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="38" name="permission[]"  <?php echo in_array(38,$per) ? "checked" : "" ?>>
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="39" name="permission[]"  <?php echo in_array(39,$per) ? "checked" : "" ?>> 
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="40" name="permission[]"  <?php echo in_array(40,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="67" name="permission[]"  <?php echo in_array(67,$per) ? "checked" : "" ?>>
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Category</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="49" name="permission[]"  <?php echo in_array(49,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="50" name="permission[]"  <?php echo in_array(50,$per) ? "checked" : "" ?>>
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="51" name="permission[]"  <?php echo in_array(51,$per) ? "checked" : "" ?>> 
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="52" name="permission[]"  <?php echo in_array(52,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="68" name="permission[]"  <?php echo in_array(68,$per) ? "checked" : "" ?>>
                    </div>
                    
                </div>
          </div>

        <!--   <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Contacts</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="41" name="permission[]"  <?php echo in_array(41,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="42" name="permission[]"  <?php echo in_array(42,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="43" name="permission[]"  <?php echo in_array(43,$per) ? "checked" : "" ?>> 
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="44" name="permission[]"  <?php echo in_array(44,$per) ? "checked" : "" ?>>
                    </div>
                    
                </div>
          </div>

          <div class="custom-control custom-checkbox list-group ">
              <div class="row">
                    <div class="col-md-3">
                        <label>Logs</label>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="45" name="permission[]"  <?php echo in_array(45,$per) ? "checked" : "" ?>>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="46" name="permission[]"  <?php echo in_array(46,$per) ? "checked" : "" ?>>
                    </div>
                     <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="47" name="permission[]"  <?php echo in_array(47,$per) ? "checked" : "" ?>> 
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" value="48" name="permission[]"  <?php echo in_array(48,$per) ? "checked" : "" ?>>
                    </div>
                    
                </div>
          </div> -->

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Update</button>
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

