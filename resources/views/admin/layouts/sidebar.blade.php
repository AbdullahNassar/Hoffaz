<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image"><img src="{{asset('storage/uploads/users').'/'.Auth::guard('admins')->user()->image}}" class="img-circle" alt=""></div>
      <div class="pull-left info">
        <h3>مرحباً</h3>
        <p>{{Auth::guard('admins')->user()->name}}</p>
        <a href="{{route('admin.profile')}}">الحالة <i class="fa fa-circle-o text-success"></i> أونلاين</a>
      </div>
    </div>
    @if(Auth::guard('admins')->user()->type == 'admin')
    <ul class="sidebar-menu">
      <li class="@if(Route::currentRouteName()=='admin.home') active @endif">
        <a href="{{route('admin.home')}}">
          <i class="fa fa-home"></i>
          <span>لوحة التحكم</span>
        </a>
      </li>
      <li class="@if(Route::currentRouteName()=='admin.org') active @endif">
        <a href="{{route('admin.org')}}">
          <i class="fa fa-edit"></i>
          <span>بيانات المؤسسة</span>
        </a>
      </li>
      <li class="@if(Route::currentRouteName()=='admin.data') active @endif">
        <a href="{{route('admin.data')}}">
          <i class="fa fa-newspaper-o"></i>
          <span>وثائق المؤسسة</span>
        </a>
      </li>
      
      <li class="treeview @if(Route::currentRouteName()=='admin.teachers') active @elseif(Route::currentRouteName()=='admin.teachers.add') active @endif">
        <a href="#">
          <i class="fa fa-user-circle-o"></i>
          <span>الموظفين</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.teachers')}}"><i class="fa fa-circle-o"></i> عرض الموظفين</a></li>
          <li><a href="{{route('admin.teachers.add')}}"><i class="fa fa-circle-o"></i> اضافة موظف</a></li>
          <li><a href="{{route('admin.teachers.files')}}"><i class="fa fa-circle-o"></i> ملفات الموظفين</a></li>
          <li><a href="{{route('admin.teachers.attend')}}"><i class="fa fa-circle-o"></i> تسجيل الحضور</a></li>
          <li><a href="{{route('admin.teachers.leave')}}"><i class="fa fa-circle-o"></i> تسجيل الانصراف</a></li>
          <li><a href="{{route('admin.jobs')}}"><i class="fa fa-circle-o"></i>الوظائف</a></li>
          <li><a href="{{route('admin.jobs.add')}}"><i class="fa fa-circle-o"></i>اضافة وظيفة</a></li>
          <li><a href="{{route('admin.salary.add')}}"><i class="fa fa-circle-o"></i>صرف سلفة</a></li>
        </ul>
      </li>
      <li class="treeview @if(Route::currentRouteName()=='admin.students') active @elseif(Route::currentRouteName()=='admin.students.add') active @endif">
        <a href="#">
          <i class="fa fa-graduation-cap"></i>
          <span>الطلاب</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.students')}}"><i class="fa fa-circle-o"></i> عرض الطلاب</a></li>
          <li><a href="{{route('admin.students.add')}}"><i class="fa fa-circle-o"></i> اضافة طالب</a></li>
          <li><a href="{{route('admin.students.files')}}"><i class="fa fa-circle-o"></i> ملفات الطلاب</a></li>
          <!--<li><a href="{{route('admin.students.payment')}}"><i class="fa fa-circle-o"></i> دفع الاشتراك</a></li>
          <li><a href="{{route('admin.students.absent')}}"><i class="fa fa-circle-o"></i> تسجيل الحضور</a></li>
          <li><a href="{{route('admin.students.attend')}}"><i class="fa fa-circle-o"></i> تقارير الحضور</a></li>
          
          <li><a href="{{route('admin.students.report')}}"><i class="fa fa-circle-o"></i> تقارير الطلاب</a></li>-->
        </ul>
      </li>
      <li class="treeview @if(Route::currentRouteName()=='admin.guardians') active @elseif(Route::currentRouteName()=='admin.guardians.add') active @endif">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>أولياء الأمور</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.guardians')}}"><i class="fa fa-circle-o"></i> عرض أولياء الأمور</a></li>
          <li><a href="{{route('admin.guardians.add')}}"><i class="fa fa-circle-o"></i> اضافة ولى أمر</a></li>
        </ul>
      </li>
      <li class="treeview @if(Route::currentRouteName()=='admin.materials') active @elseif(Route::currentRouteName()=='admin.materials.add') active @elseif(Route::currentRouteName()=='admin.materials.files') active @elseif(Route::currentRouteName()=='admin.materials.grades') active @endif">
        <a href="#">
          <i class="fa fa-leanpub"></i>
          <span>المواد الدراسية</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.materials')}}"><i class="fa fa-circle-o"></i> عرض المواد</a></li>
          <li><a href="{{route('admin.materials.add')}}"><i class="fa fa-circle-o"></i> اضافة مادة</a></li>
          <li><a href="{{route('admin.materials.files')}}"><i class="fa fa-circle-o"></i> ملفات المواد</a></li>
          <li><a href="{{route('admin.materials.grades')}}"><i class="fa fa-circle-o"></i> اضافة بنود المادة</a></li>
        </ul>
      </li>
      <li class="treeview @if(Route::currentRouteName()=='admin.centers') active @elseif(Route::currentRouteName()=='admin.centers.add') active @endif">
        <a href="#">
          <i class="fa fa-building"></i>
          <span>المراكز </span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.centers')}}"><i class="fa fa-circle-o"></i> عرض المراكز</a></li>
          <li><a href="{{route('admin.centers.add')}}"><i class="fa fa-circle-o"></i> اضافة مركز</a></li>
        </ul>
      </li>
      <li class="treeview @if(Route::currentRouteName()=='admin.transportations') active @elseif(Route::currentRouteName()=='admin.transportations.add') active @endif">
        <a href="#">
          <i class="fa fa-bus"></i>
          <span>المواصلات </span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.transportations')}}"><i class="fa fa-circle-o"></i> عرض المواصلات</a></li>
          <li><a href="{{route('admin.transportations.add')}}"><i class="fa fa-circle-o"></i> اضافة مواصلة</a></li>
        </ul>
      </li>
      <li class="treeview @if(Route::currentRouteName()=='admin.courses') active @elseif(Route::currentRouteName()=='admin.courses.add') active @endif">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span> الحلقات</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.courses')}}"><i class="fa fa-circle-o"></i> عرض الحلقات</a></li>
          <li><a href="{{route('admin.courses.add')}}"><i class="fa fa-circle-o"></i> اضافة حلقة</a></li>
        </ul>
      </li>
      <li class="treeview @if(Route::currentRouteName()=='admin.levels') active @elseif(Route::currentRouteName()=='admin.levels.add') active @endif">
        <a href="#">
          <i class="fa fa-bar-chart"></i>
          <span> المستويات</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.levels')}}"><i class="fa fa-circle-o"></i> عرض المستويات</a></li>
          <li><a href="{{route('admin.levels.add')}}"><i class="fa fa-circle-o"></i> اضافة مستوى</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-stack-overflow"></i>
          <span>التقارير</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.reports.absent')}}"><i class="fa fa-circle-o"></i> تقارير حضور الطلاب</a></li>
          <li><a href="{{route('admin.reports.grades')}}"><i class="fa fa-circle-o"></i> تقارير درجات الطلاب</a></li>
          <li><a href="{{route('admin.reports.counts')}}"><i class="fa fa-circle-o"></i> تقارير حسابات الطلاب</a></li>
          <li><a href="{{route('admin.reports.attend')}}"><i class="fa fa-circle-o"></i> تقارير حضور الموظفين</a></li>
          <li><a href="{{route('admin.reports.salaries')}}"><i class="fa fa-circle-o"></i> تقارير مرتبات الموظفين</a></li>
        </ul>
      </li>
      <li class="@if(Route::currentRouteName()=='admin.store') active @endif">
        <a href="{{route('admin.store')}}">
          <i class="fa fa-home"></i>
          <span> الخزينة</span>
        </a>
      </li>
    </ul>
    @elseif(Auth::guard('admins')->user()->type == 'teacher')
    <ul class="sidebar-menu">
      <li class="@if(Route::currentRouteName()=='admin.home') active @endif">
        <a href="{{route('admin.home')}}">
          <i class="fa fa-home"></i>
          <span>لوحة التحكم</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-stack-overflow"></i>
          <span>التقارير</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.reports.attend')}}"><i class="fa fa-circle-o"></i> تقارير حضور الموظفين</a></li>
        </ul>
      </li>
    </ul>
    @elseif(Auth::guard('admins')->user()->type == 'accountant')
    <ul class="sidebar-menu">
      <li class="@if(Route::currentRouteName()=='admin.home') active @endif">
        <a href="{{route('admin.home')}}">
          <i class="fa fa-home"></i>
          <span>لوحة التحكم</span>
        </a>
      </li>
      <li class="@if(Route::currentRouteName()=='admin.org') active @endif">
        <a href="{{route('admin.org')}}">
          <i class="fa fa-edit"></i>
          <span>بيانات المؤسسة</span>
        </a>
      </li>
      <li class="@if(Route::currentRouteName()=='admin.data') active @endif">
        <a href="{{route('admin.data')}}">
          <i class="fa fa-newspaper-o"></i>
          <span>وثائق المؤسسة</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-stack-overflow"></i>
          <span>التقارير</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.reports.absent')}}"><i class="fa fa-circle-o"></i> تقارير حضور الطلاب</a></li>
          <li><a href="{{route('admin.reports.grades')}}"><i class="fa fa-circle-o"></i> تقارير درجات الطلاب</a></li>
          <li><a href="{{route('admin.reports.counts')}}"><i class="fa fa-circle-o"></i> تقارير حسابات الطلاب</a></li>
          <li><a href="{{route('admin.reports.attend')}}"><i class="fa fa-circle-o"></i> تقارير حضور الموظفين</a></li>
          <li><a href="{{route('admin.reports.salaries')}}"><i class="fa fa-circle-o"></i> تقارير مرتبات الموظفين</a></li>
        </ul>
      </li>
      <li class="@if(Route::currentRouteName()=='admin.store') active @endif">
        <a href="{{route('admin.store')}}">
          <i class="fa fa-home"></i>
          <span> الخزينة</span>
        </a>
      </li>
    </ul>
    @endif
    <div class="footer-widget">
      <div class="progress transparent progress-small no-radius no-margin">
        <div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" style="width: 79%;"></div>
      </div>
      <div class="pull-right">
        <div class="details-status"> <span data-animation-duration="560" data-value="86" class="animate-number">86</span>% </div>
        <a href="{{route('admin.lock')}}"><i class="fa fa-power-off"></i></a></div>
    </div>
  </section>
  <!-- Sidebar End -->
</aside>