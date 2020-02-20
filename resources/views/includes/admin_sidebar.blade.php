<aside class="main-sidebar">

  <section class="sidebar">

    
    <ul class="sidebar-menu" data-widget="tree">

      
      <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

      
      
      

     
      
<!-- 

    
   
      <li class=" treeview">

        <a href="{{ route('admin.dashboard') }}">

          <i class="fa fa-bars"></i> <span>Permission</span>

          <span class="pull-right-container">

            <i class="fa fa-angle-left pull-right"></i>

          </span>

        </a>

        <ul class="treeview-menu">

            <li><a href="{{ route('admin.permissions.addpermissions') }}"><i class="fa fa-circle-o"></i> Add Permission</a></li>

          <li><a href="{{ route('admin.permissions') }}"><i class="fa fa-circle-o"></i> Permission List</a></li>

        </ul>

      </li> -->



      

      

    
      @role('editor')
      @permission(['role-view','role-add','role-edit','role-delete'])
          <li class=" treeview">

            <a href="{{ route('admin.dashboard') }}">

              <i class="fa fa-bars"></i> <span>Roles</span>

              <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>

            </a>

            <ul class="treeview-menu">

                <!-- <li><a href="{{ route('admin.roles.addroles') }}"><i class="fa fa-circle-o"></i> Add Roles</a></li> -->

              <li><a href="{{ route('admin.roles') }}"><i class="fa fa-circle-o"></i> Roles List</a></li>

            </ul>

          </li>
      @endpermission
       @endrole

      @role('admin')

      
      <li class=" treeview">

            <a href="{{ route('admin.dashboard') }}">

              <i class="fa fa-bars"></i> <span>Roles</span>

              <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>

            </a>

            <ul class="treeview-menu">

                <!-- <li><a href="{{ route('admin.roles.addroles') }}"><i class="fa fa-circle-o"></i> Add Roles</a></li> -->

              <li><a href="{{ route('admin.roles') }}"><i class="fa fa-circle-o"></i> Roles List</a></li>

            </ul>

          </li>
          <li class=" treeview">

        <a href="{{ route('admin.dashboard') }}">

          <i class="fa fa-bars"></i> <span>Users</span>

          <span class="pull-right-container">

            <i class="fa fa-angle-left pull-right"></i>

          </span>

        </a>

        <ul class="treeview-menu">

            <li><a href="{{ route('admin.users.addusers') }}"><i class="fa fa-circle-o"></i> Add Users</a></li>

          <li><a href="{{ route('admin.users') }}"><i class="fa fa-circle-o"></i> Users List</a></li>

        </ul>

      </li>
        @endrole

    

      @permission(['page-view','page-add','page-edit','page-delete'])
      <li class=" treeview">

        <a href="{{ route('admin.dashboard') }}">

          <i class="fa fa-bars"></i> <span>Pages</span>

          <span class="pull-right-container">

            <i class="fa fa-angle-left pull-right"></i>

          </span>

        </a>

        <ul class="treeview-menu">
          @permission('page-add')
            <li>
              <a href="{{ route('admin.pages.addpages') }}"><i class="fa fa-circle-o"></i> Add Pages</a>
            </li>
          @endpermission
          <li>
            <a href="{{ route('admin.pages') }}"><i class="fa fa-circle-o"></i> Pages List</a>
          </li>

        </ul>

      </li>  
      @endpermission

      @permission(['menu-view','menu-add','menu-edit','menu-delete'])
      <li class=" treeview">

        <a href="{{ route('admin.dashboard') }}">

          <i class="fa fa-bars"></i> <span>Menu</span>

          <span class="pull-right-container">

            <i class="fa fa-angle-left pull-right"></i>

          </span>

        </a>

        <ul class="treeview-menu">
          @permission('menu-add')
          <li><a href="{{ route('admin.menu.addmenu') }}"><i class="fa fa-circle-o"></i> Add Menu</a></li>
          @endpermission

          <li><a href="{{ route('admin.menu') }}"><i class="fa fa-circle-o"></i> Menu List</a></li>

        </ul>

      </li>
      @endpermission

      @permission(['submenu-view','submenu-add','submenu-edit','submenu-delete'])
      <li class=" treeview">

        <a href="{{ route('admin.dashboard') }}">

          <i class="fa fa-bars"></i> <span>Sub Menu</span>

          <span class="pull-right-container">

            <i class="fa fa-angle-left pull-right"></i>

          </span>

        </a>

        <ul class="treeview-menu">
          @permission('submenu-add')
          <li><a href="{{ route('admin.submenu.addsubmenu') }}"><i class="fa fa-circle-o"></i> Add Sub Menu</a></li>
          @endpermission
          <li><a href="{{ route('admin.submenu') }}"><i class="fa fa-circle-o"></i> Sub Menu List</a></li>

        </ul>
      </li>
      @endpermission

      @permission(['slider-view','slider-add','slider-edit','slider-delete'])
      <li class=" treeview">

        <a href="{{ route('admin.dashboard') }}">

          <i class="fa fa-bars"></i> <span>Slider</span>

          <span class="pull-right-container">

            <i class="fa fa-angle-left pull-right"></i>

          </span>

        </a>

        <ul class="treeview-menu">
          @permission('slider-add')
          <li><a href="{{ route('admin.slider.addslider') }}"><i class="fa fa-circle-o"></i> Add Slider</a></li>
          @endpermission
          <li><a href="{{ route('admin.slider') }}"><i class="fa fa-circle-o"></i> Slider List</a></li>

        </ul>

      </li>
      @endpermission

        @permission(['category-view','category-add','category-edit','category-delete'])
      <li class=" treeview">

        <a href="{{ route('admin.dashboard') }}">

          <i class="fa fa-bars"></i> <span>Gallery Category</span>

          <span class="pull-right-container">

            <i class="fa fa-angle-left pull-right"></i>

          </span>

        </a>

        <ul class="treeview-menu">
          @permission('category-add')
            <li><a href="{{ route('admin.category.addcategory') }}"><i class="fa fa-circle-o"></i> Add Gallery Category</a></li>
          @endpermission
          <li><a href="{{ route('admin.category') }}"><i class="fa fa-circle-o"></i> Gallery Category List</a></li>

        </ul>

      </li>
      @endpermission

      @permission(['gallery-view','gallery-add','gallery-edit','gallery-delete'])
      <li class=" treeview">

              <a href="{{ route('admin.dashboard') }}">

                <i class="fa fa-bars"></i> <span>Gallery</span>

                <span class="pull-right-container">

                  <i class="fa fa-angle-left pull-right"></i>

                </span>

              </a>

              <ul class="treeview-menu">
                @permission('gallery-add')
                <li><a href="{{ route('admin.gallery.addgallery') }}"><i class="fa fa-circle-o"></i> Add Gallery</a></li>
                @endpermission
                <li><a href="{{ route('admin.gallery') }}"><i class="fa fa-circle-o"></i> Gallery List</a></li>

              </ul>

      </li>
      @endpermission

      @permission(['logo-view','logo-add','logo-edit','logo-delete'])
      <li class=" treeview">

              <a href="{{ route('admin.dashboard') }}">

                <i class="fa fa-bars"></i> <span>Useful Links</span>

                <span class="pull-right-container">

                  <i class="fa fa-angle-left pull-right"></i>

                </span>

              </a>

              <ul class="treeview-menu">
                @permission('logo-add')
                <li><a href="{{ route('admin.partners.addpartners') }}"><i class="fa fa-circle-o"></i> Add Useful Links</a></li>
                @endpermission
                <li><a href="{{ route('admin.partners') }}"><i class="fa fa-circle-o"></i> Useful Links List</a></li>

              </ul>

      </li>
      @endpermission

      @permission(['news-view','news-add','news-edit','news-delete'])
      <li class=" treeview">

        <a href="{{ route('admin.dashboard') }}">

          <i class="fa fa-bars"></i> <span>News</span>

          <span class="pull-right-container">

            <i class="fa fa-angle-left pull-right"></i>

          </span>

        </a>

        <ul class="treeview-menu">
          @permission('news-add')
          <li><a href="{{ route('admin.news.addnews') }}"><i class="fa fa-circle-o"></i> Add News</a></li>
          @endpermission
          <li><a href="{{ route('admin.news') }}"><i class="fa fa-circle-o"></i> News List</a></li>

        </ul>

      </li>
      @endpermission

      @permission(['whatsnew-view','whatsnew-add','whatsnew-edit','whatsnew-delete'])
      <li class=" treeview">

        <a href="{{ route('admin.dashboard') }}">

          <i class="fa fa-bars"></i> <span>What's New</span>

          <span class="pull-right-container">

            <i class="fa fa-angle-left pull-right"></i>

          </span>

        </a>

        <ul class="treeview-menu">
              @permission('whatsnew-add')
                <li><a href="{{ route('admin.whatsnew.addwhatsnew') }}"><i class="fa fa-circle-o"></i> Add What's New</a></li>
              @endpermission
                <li><a href="{{ route('admin.whatsnew') }}"><i class="fa fa-circle-o"></i> What's New List</a></li>

              </ul>

      </li>
      @endpermission


     @role('admin')
      <li class=" treeview">

        <a href="{{ route('admin.dashboard') }}">

          <i class="fa fa-bars"></i> <span>Contacts</span>

          <span class="pull-right-container">

            <i class="fa fa-angle-left pull-right"></i>

          </span>

        </a>

        <ul class="treeview-menu">

          <li><a href="{{ route('admin.contacts') }}"><i class="fa fa-circle-o"></i> Contacts List</a></li>

        </ul>

      </li>
      @endrole
      
      @permission(['settings-view','settings-add','settings-edit','settings-delete'])
      <li class=" treeview">

        <a href="{{ route('admin.dashboard') }}">

          <i class="fa fa-bars"></i> <span>Settings</span>

          <span class="pull-right-container">

            <i class="fa fa-angle-left pull-right"></i>

          </span>

        </a>

        <ul class="treeview-menu">

          <li><a href="{{ route('admin.setting.addsetting') }}"><i class="fa fa-circle-o"></i>Settings</a></li>

        </ul>
      </li>
      @endpermission

      @permission(['file-view','file-add','file-edit','file-delete'])
      <li class=" treeview">

        <a href="{{ route('admin.dashboard') }}">

          <i class="fa fa-bars"></i> <span>File</span>

          <span class="pull-right-container">

            <i class="fa fa-angle-left pull-right"></i>

          </span>

        </a>

        <ul class="treeview-menu">
          @permission('file-add')
          <li><a href="{{ route('admin.files.addfiles') }}"><i class="fa fa-circle-o"></i> Add File</a></li>
          @endpermission

          <li><a href="{{ route('admin.files') }}"><i class="fa fa-circle-o"></i> File List</a></li>

        </ul>

      </li>
      @endpermission

      @role('admin')
      <li class=" treeview">

        <a href="{{ route('admin.dashboard') }}">

          <i class="fa fa-bars"></i> <span>Logs</span>

          <span class="pull-right-container">

            <i class="fa fa-angle-left pull-right"></i>

          </span>

        </a>

        <ul class="treeview-menu">

          <li><a href="{{ route('admin.logs') }}"><i class="fa fa-circle-o"></i> Logs List</a></li>

        </ul>

      </li>
       @endrole
      

    </ul>

  </section>

  <!-- /.sidebar -->

</aside>

