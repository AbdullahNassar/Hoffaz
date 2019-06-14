<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <img src="{{asset('assets/admin/img/logo-mini.png')}}" class="logo-mini" alt="">
    <img src="{{asset('assets/admin/img/logo.png')}}" class="logo-lg" alt="">
  </a>

  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <!-- search form 
    <form action="#" method="get" class="sidebar-form pull-left">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
      </div>
    </form>
     /.search form -->

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!--<li class="dropdown Categories-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-th" data-toggle="tooltip" data-placement="left" title="Categories"></i>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="#">
                <div class="Cat-img Cat-img1"></div>
                <span>User Management</span>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="Cat-img Cat-img2"></div>
                <span>Lookups Management</span>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="Cat-img Cat-img3"></div>
                <span>Hospital Management</span>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="Cat-img Cat-img4"></div>
                <span>Departments Management</span>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="Cat-img Cat-img5"></div>
                <span>Specialties Management</span>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="Cat-img Cat-img6"></div>
                <span>System Reports</span>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="Cat-img Cat-img7"></div>
                <span>Reports Management</span>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="Cat-img Cat-img8"></div>
                <span>Login history records</span>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="Cat-img Cat-img9"></div>
                <span>SMS Log</span>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="Cat-img Cat-img10"></div>
                <span>Send SMS</span>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="Cat-img Cat-img11"></div>
                <span>Attendance</span>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="Cat-img Cat-img12"></div>
                <span>System Errors</span>
              </a>
            </li>
          </ul>
        </li>-->


        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{asset('storage/uploads/users').'/'.Auth::guard('members')->user()->image}}" class="user-image" alt="">
            <span class="hidden-xs">{{Auth::guard('members')->user()->guardian_name}}</span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="{{asset('storage/uploads/users').'/'.Auth::guard('members')->user()->image}}" class="img-circle" alt="">
              <p>{{Auth::guard('members')->user()->guardian_name}}</p>
            </li>
            <li class="user-footer">
              <div class="pull-left"><a href="{{route('site.profile')}}" class="btn btn-flat">الصفحة الشخصية</a></div>
              <div class="pull-right"><a href="{{route('site.logout')}}" class="btn btn-flat">تسجيل الخروج</a></div>
            </li>
          </ul>
        </li>

        <li class="dropdown settings-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-cog" data-toggle="tooltip" data-placement="left" title="Settings"></i>
          </a>
          <ul class="dropdown-menu">
            <li><a href="{{route('site.profile')}}"><i class="fa fa-user"></i>&nbsp;&nbsp;My Profile</a></li>
            <li><a href="#" id="fullscreen"><i class="fa fa-arrows"></i>&nbsp;&nbsp;Full Screen</a></li>
            <li><a href="{{route('site.lock')}}" id="fullscreen"><i class="fa fa-lock"></i>&nbsp;&nbsp;Lock Screen</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>

    <!--<a class="dates">
      <img src="{{asset('assets/admin/img/logo-mini.png')}}" class="ksu" alt="">
      <h3><span>16:45 م</span></h3>
      <br>
      <span id="js-rotating"> 28 مارس 2018, 19 جمادى الآخر 1440</span>
    </a>-->

  </nav>
</header>