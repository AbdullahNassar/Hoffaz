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

        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{asset('storage/uploads/users').'/'.Auth::guard('admins')->user()->image}}" class="user-image" alt="">
            <span class="hidden-xs">{{Auth::guard('admins')->user()->name}}</span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="{{asset('storage/uploads/users').'/'.Auth::guard('admins')->user()->image}}" class="img-circle" alt="">
              <p>{{Auth::guard('admins')->user()->name}}</p>
            </li>
            <li class="user-footer">
              <div class="pull-left"><a href="{{route('admin.profile')}}" class="btn btn-flat">الصفحة الشخصية</a></div>
              <div class="pull-right"><a href="{{route('admin.logout')}}" class="btn btn-flat">تسجيل الخروج</a></div>
            </li>
          </ul>
        </li>

        <li class="dropdown settings-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-cog" data-toggle="tooltip" data-placement="left" title="Settings"></i>
          </a>
          <ul class="dropdown-menu">
            <li><a href="{{route('admin.profile')}}"><i class="fa fa-user"></i>&nbsp;&nbsp;My Profile</a></li>
            <li><a href="#" id="fullscreen"><i class="fa fa-arrows"></i>&nbsp;&nbsp;Full Screen</a></li>
            <li><a href="{{route('admin.lock')}}" id="fullscreen"><i class="fa fa-lock"></i>&nbsp;&nbsp;Lock Screen</a></li>
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