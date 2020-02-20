<header class="main-header">

  <!-- Logo -->

  <a href="{{ route('admin.dashboard') }}" class="logo">

    <!-- mini logo for sidebar mini 50x50 pixels -->

    <span class="logo-mini"><b>D</b></span>

    <!-- logo for regular state and mobile devices -->



    <span class="logo-lg" ><img src="{{asset('public/front_end/images/admin_sidebar_logo.png')}}" style="background-color: white;" ></span>

  </a>

  <!-- Header Navbar: style can be found in header.less -->

  <nav class="navbar navbar-static-top">

    

    <!-- Sidebar toggle button-->

    <a href="{{ env('APP_URL') }}/admin_assets/#" class="sidebar-toggle" data-toggle="push-menu" role="button">

      <span class="sr-only">Toggle navigation</span>

    </a>

    

   



        <div class="navbar-custom-menu">

      <ul class="nav navbar-nav">

        

        

        

        





        <li class="dropdown user user-menu">

          <a href="{{ env('APP_URL') }}/admin_assets/#" class="dropdown-toggle" data-toggle="dropdown">

            <!-- <img src="{{ env('APP_URL') }}/admin_assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->

            <span class="hidden-xs">{{ ucfirst(auth()->user()->name) }}</span>

          </a>

          <ul class="dropdown-menu">

            <!-- User image -->

            <li class="user-header">

              <!-- <img src="{{ env('APP_URL') }}/admin_assets/dist/img/user2-160x160.jpg"  alt="User Image"> -->

              <img src="{{asset('public/front_end/images/dtcp_logo.png')}}" class="img-circle" width="150" height="150">



              <p>

                {{ ucfirst(auth()->user()->name) }}


              <?php $roles=Auth::user()->roles()->first();?>

                @if($roles)

                  <small>{{ ucfirst($roles->name) }}</small>

                @endif

              </p>

            </li>

            <!-- Menu Body -->

            <!-- <li class="user-body">

              <div class="row">

                <div class="col-xs-4 text-center">

                  <a href="#">Followers</a>

                </div>

                <div class="col-xs-4 text-center">

                  <a href="#">Sales</a>

                </div>

                <div class="col-xs-4 text-center">

                  <a href="#">Friends</a>

                </div>

              </div>

            </li> -->

            <!-- Menu Footer-->

            <li class="user-footer">

             <!--  <div class="pull-left">

                <a href="#" class="btn btn-default btn-flat">{{$roles->name}}</a>

              </div> -->

              <div class="pull-right">

                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"

                   onclick="event.preventDefault();

                                 document.getElementById('logout-form').submit();">

                    {{ __('Logout') }}

                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                    @csrf

                </form>

              </div>

            </li>

          </ul>

        </li>

        <!-- Control Sidebar Toggle Button -->

      </ul>

    </div>

  </nav>

</header>

