<!DOCTYPE html>
<html lang="ar">
    <head>
        <!-- Meta Tags
        ========================== -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #2 for form layouts" name="description" />
        <meta content="" name="author" />
        <meta name="csrf_token" content="{{csrf_token()}}">


        <!-- Site Title
        ========================== -->
        <title>تقرير مرتبات : {{$teacher->teacher_name}}</title>
        
        <!-- Favicon
        ===========================-->
        <link rel="shortcut icon" href="{{asset('assets/admin/img/logo-mini.png')}}">

        
        <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/font-awesome.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/datatables.css')}}">
        

        <link rel="stylesheet" href="{{asset('assets/admin/plugins/daterangepicker/daterangepicker-bs3.css')}}">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="{{asset('assets/admin/plugins/iCheck/all.css')}}">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="{{asset('assets/admin/plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="{{asset('assets/admin/plugins/timepicker/bootstrap-timepicker.min.css')}}">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{asset('assets/admin/css/select2.css')}}">  

        

        
        <link href="{{asset('assets/admin/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/sweetalert.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('assets/admin/css/float-labels.css')}}">

        <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}" id="stylesheet">

        

        

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="sidebar-mini">
    
        <div class="wrapper">
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

            <!-- Content page Start -->
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box transparent">
                                <div class="box-header border">
                                    <h3 class="box-title"><span class="semi-bold"> تقرير مرتبات : {{$teacher->teacher_name}}</span></h3>
                                    <div class="box-tools pull-right">
                                        <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-chevron-down"></i></a>
                                        <a class="btn btn-box-tool"><i class="fa fa-repeat"></i></a>
                                        <a class="btn btn-box-tool"><i class="fa fa-cog"></i></a>
                                        <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                                <div class="box-body white-bg">
                                <table id="tables" class="display" style="max-width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>المدرس</th>
                                        <th>الراتب الأساسى</th>
                                        <th>أيام الحضور</th>
                                        <th>الشهر</th>
                                        <th>السنة</th>
                                        <th>الساعات الاضافية</th>
                                        <th>المبلغ الاضافى</th>
                                        <th>الخصومات</th>
                                        <th>السلف</th>
                                        <th>صافى الراتب</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($salaries as $salary)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$teacher->teacher_name}}</td>
                                        <td>{{$salary->salary}}</td>
                                        <td>{{$salary->days}}</td>
                                        <td>{{$salary->month}}</td>
                                        <td>{{$salary->year}}</td>
                                        <td>{{$salary->hours}}</td>
                                        <td>{{$salary->bonus}}</td>
                                        <td>{{$salary->minus}}</td>
                                        <td>{{$salary->parts}}</td>
                                        <td>{{$salary->final}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section>
            </div>
            <!-- Content page End -->

        </div>

        <script src="{{asset('assets/admin/js/jQuery-2.1.4.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
        
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
        <script src="https://nightly.datatables.net/responsive/js/dataTables.responsive.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#tables').DataTable( {
                  "language":{
                    "decimal":        "",
                    "emptyTable":     "لا يوجد بيانات",
                    "info": "عرض صفحة _PAGE_ من _PAGES_ صفحات",
                    "infoEmpty":      "عرض مدخلات من 0 الى 0 ",
                    "infoFiltered":   "(محدد من _MAX_ عنصر)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "عرض مدخلات القائمة",
                    "loadingRecords": "...تحميل",
                    "processing":     "...تنفيذ",
                    "search":         ":ابحث",
                    "zeroRecords":    "لا يوجد نتائج للبحث",
                    "paginate": {
                        "first":      "الأول",
                        "last":       "الأخير",
                        "next":       "التالى",
                        "previous":   "السابق"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                  },
                    dom: 'Bfrtip',
                    columnDefs: [
                        {
                            targets: 1,
                            className: 'noVis'
                        }
                    ],
                    buttons: [
                        {
                            text: 'نسخ',
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: [ ':visible' ]
                            }
                        },
                        {
                          text: 'اكسل',
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                          text: 'طباعة',
                            extend: 'print',
                            messageTop: '',
                            exportOptions: {
                                columns: [ ':visible' ]
                            }
                        },
                        {
                          
                          extend: 'colvis',
                          className: 'btn-orange',
                          text: 'تحديد الأعمدة'
                        }
                        
                    ]
                } );
            } );
        </script>
        
        

        <!-- fullscreen -->
        <script src="{{asset('assets/admin/js/screenfull.js')}}"></script>

        <!-- text-rotator -->
        <script src="{{asset('assets/admin/js/morphext.js')}}"></script>

        


        <!-- Tanseeq App -->
        
        <script src="{{asset('assets/admin/js/app.min.js')}}"></script>

        
        <script src="{{asset('assets/admin/plugins/nicescroll/jquery.nicescroll.min.js')}}"></script>
        <script type="text/javascript">
          /* Nice Scroll
          ===============================*/
          $(document).ready(function () {
              
              "use strict";
              
              $("html").niceScroll({
                  scrollspeed: 60,
                  mousescrollstep: 35,
                  cursorwidth: 5,
                  cursorcolor: '#f3834e',
                  cursorborder: 'none',
                  background: 'rgb(27, 30, 36)',
                  cursorborderradius: 3,
                  autohidemode: false,
                  cursoropacitymin: 0.1,
                  cursoropacitymax: 1,
                  zindex: "999",
                  horizrailenabled: false
              });
            
          });
        </script>
        <script src="{{asset('assets/admin/js/process.js')}}" type="text/javascript"></script>
    </body>
</html>
