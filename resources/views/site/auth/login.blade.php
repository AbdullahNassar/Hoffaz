
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
	<!-- Page Preloder -->
    <div id="preloder">
       <div class="loader">				                           
          <span class="bounce1">H</span>				                           
          <span class="bounce2">O</span>				                           
          <span class="bounce3">F</span>                                   
          <span class="bounce4">F</span>
          <span class="bounce5">A</span>
          <span class="bounce6">Z</span>		                      
       </div>
    </div>


	<!-- Audio -->
	<div class="play active" id="btn1"></div>
    <audio id="sound1" autoplay loop><source src="{{asset('assets/admin/login/quran1.mp3')}}"></audio>
	
    
	<!--====== Header Section Start ======-->
    <div class="logo">
        <img src="{{asset('assets/admin/login/img/logo.png')}}" alt=""><!-- Logo -->
    </div>


	<!-- ==== Intro Section Start ==== -->
	<section class="intro-section fix" id="home">
		<div class="intro-bg bg-cms"></div>
		<div class="intro-inner">
			<div class="intro-content">
				<div id="round"></div>
                <div id="login-box2">
                  <div class="profile-img">
                      <img src="{{asset('assets/admin/login/img/logo2.png')}}" alt="">
                  </div>
                  <form class="login-form" action="{{ route('site.login') }}" method="post">
                    {{ csrf_field() }}
                    <button class="submit" type="submit"><span class="fa fa-lock"></span></button>
                    <span class="fa fa-user inputUserIcon"></span>
                    <input type="text" class="user" placeholder="National ID" name="email"/>
                    <span class="fa fa-key inputPassIcon"></span>
                    <input type="password" class="pass" placeholder="Password" name="password"/>
                    
                  </form>
                  <div class="alerts-success" style="display: none; color: #ffffff;"><span style="color: #ffffff;" class="element2" role="alert">تم تسجيل الدخول بنجاح</span></div>
                  <div class="alerts-danger" style="display: none; color: #ffffff;"><span style="color: #ffffff;" class="element2" role="alert">حدث خطأ, يرجى التأكد من البيانات المدخلة</span></div>

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
</body>
</html>
