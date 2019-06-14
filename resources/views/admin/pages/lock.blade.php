
<!DOCTYPE>
<html>
<head>
<title>نظام حفاظ</title>
	<meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{csrf_token()}}">
	<!-- Favicon -->   
	<link href="{{asset('assets/admin/login/img/favicon.ico')}}" rel="shortcut icon"/>

	<!-- Stylesheets -->
	<link href="{{asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/admin/login/css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('assets/admin/login/css/style.css')}}"/>


</head>
<body>



	<!-- ==== Intro Section Start ==== -->
	<section class="intro-section fix" id="home">
		<div class="intro-bg bg-cms"></div>
		<div class="intro-inner">
			<div class="intro-content">
				<div id="round"></div>
                <div id="lock-box2">
                  <div class="lockscreen-wrapper">
                    <div class="lockscreen-logo">
                      <a href="#"><img src="{{asset('assets/admin/login/img/logo.png')}}" alt=""></a>
                    </div>
                    <!-- User name -->
                    <div class="lockscreen-name"><span class="element2">{{Auth::guard('admins')->user()->name}}</span></div>
              
                    <!-- START LOCK SCREEN ITEM -->
                    <div class="lockscreen-item">
                      <!-- lockscreen image -->
                      <div class="lockscreen-image">
                        <img src="{{asset('storage/uploads/users').'/'.Auth::guard('admins')->user()->image}}" alt="">
                      </div>
                      <!-- /.lockscreen-image -->
              
                      <!-- lockscreen credentials (contains the form) -->
                      <form class="lockscreen-credentials login-form" action="{{ route('admin.back') }}" method="post">
                        
                        <div class="input-group">
                          <input class="form-control" class="pass" style="text-align:right;" placeholder="كلمة السر" type="password" name="password">
                          {{ csrf_field() }}
                          <div class="input-group-btn">
                            <button class="btn" type="submit"><i class="fa fa-unlock text-muted"></i></button>
                          </div>
                        </div>
                      </form><!-- /.lockscreen credentials -->
              
                    </div><!-- /.lockscreen-item -->
                      <a class="element2" href="{{route('admin.logout')}}">تسجيل الخروج</a><br><br>
                    <div class="alerts-success" style="display: none; color: #ffffff;"><span style="color: #ffffff;" class="element2" role="alert">تم تسجيل الدخول بنجاح</span></div>
                    <div class="alerts-danger" style="display: none; color: #ffffff;"><span style="color: #ffffff;" class="element2" role="alert">حدث خطأ, يرجى التأكد من البيانات المدخلة</span></div>
                  </div>
                </div><!-- login-box -->
			</div>
		</div>
	</section>
	<!-- ==== Intro Section End ==== -->



	<!--====== Javascripts & Jquery ======-->	
	<script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
	<script src="{{asset('assets/admin/login/js/plugin.js')}}"></script>
    <script src="{{asset('assets/admin/login/js/login.js')}}"></script>
	<script src="{{asset('assets/admin/login/js/main.js')}}"></script>
    <script src="{{asset('assets/admin/login/js/jquery.fullscreen.js')}}"></script>
    <script type="text/javascript">
    
    $(function() {
        $('#body').click(function() {
            $('body').fullscreen();
        })
    });
    </script>
</body>
</html>
