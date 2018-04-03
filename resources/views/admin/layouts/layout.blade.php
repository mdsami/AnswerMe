<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>لوحة التحكم| @yield('title')</title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{{Request::root()}}/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="{{Request::root()}}/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="{{Request::root()}}/assets/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="{{Request::root()}}/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="{{Request::root()}}/assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="{{Request::root()}}/assets/css/ace-rtl.min.css" />
		<script src="{{Request::root()}}/assets/js/ace-extra.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Cairo:600" rel="stylesheet">
		



		<style type="text/css">
			h1,h2,h3,h4,h5,span,div,nav,label,input,button,table,tr,td{
				font-family: 'Cairo', sans-serif;
		  		color:#751a42;
			}

		</style>
		@yield('links')
	</head>
	<body class="no-skin rtl" >
		<div id="navbar" class="navbar navbar-default          ace-save-state" style="background-color:  #751a42;">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" 
				style="background-color:#751a42; border:1px solid #fff " id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-header pull-right">
					<a href="/home" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							   جاوبني
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-left" role="navigation">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            	<i class="fa fa-sign-in fa-3x" style="color:#fff"></i>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                               
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<h2>لوحة التحكم</h2>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-info"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-info"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list"  ">
					<li class="active open">
						<a href="/home" style="font-size:15px; ">
							<i class="menu-icon fa fa-home"></i>
							<span class="menu-text">الرئيسة</span>
						</a>

						
					</li>


					<li class="active open">
						<a href="/adminpanel/admins" style="font-size:15px; ">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text">المسئولين</span>
						</a>

						
					</li>


					<li class="active open" >
						<a href="/adminpanel/UsersMangemant" style="font-size:15px; ">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text">المستخدمين</span>
						</a>

						
					</li>


					<li class="active open">
						<a href="/adminpanel/suggestions" style="font-size:15px;  ">
							<i class="menu-icon fa fa-comment"></i>
							<span class="menu-text">اﻻقتراحات والشكاوي</span>
						</a>

						
					</li>


					<li class="active open">
						<a href="/adminpanel/policy_terms" style="font-size:15px;  ">
							<i class="menu-icon fa fa-sticky-note-o"></i>
							<span class="menu-text">شروط اﻻستخدام</span>
						</a>

						
					</li>


					<li class="active open">
						<a href="/adminpanel/contactUs" style="font-size:15px; ">
							<i class="menu-icon fa fa-phone"></i>
							<span class="menu-text">تواصل معنا</span>
						</a>

						
					</li>


					<li class="active open">
						<a href="/adminpanel/aboutUs" style="font-size:15px; ">
							<i class="menu-icon fa fa-info-circle"></i>
							<span class="menu-text">عن التطبيق</span>
						</a>

						
					</li>

			

				

					

				

				

				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
								 @yield('content')
					</div>
				</div>	
			</div>	

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">جاوبني</span>
							 &copy; 2017-2018
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="{{Request::root()}}/assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='{{Request::root()}}/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="{{Request::root()}}/assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="{{Request::root()}}/assets/js/ace-elements.min.js"></script>
		<script src="{{Request::root()}}/assets/js/ace.min.js"></script>



		<!-- inline scripts related to this page -->
		 @yield('footer')
	</body>
</html>
