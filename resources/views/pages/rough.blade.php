<!DOCTYPE html>
<html lang="zxx" class="js">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!-- Fav Icon  -->
	    <link rel="shortcut icon" href="{{ asset('images/cropped-Logo-Final-Masum.png') }}">
		<!-- Site Title  -->
		<title>@yield('title', 'SIPEAA | Home')</title>
		<!-- Vendor Bundle CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/vendor.bundle.css') }}" >
		<!-- Custom styles for this template -->
		<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<style>
.carousel-item {
  height: 100vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

</style>
<style>
body{padding-top:30px;}

.glyphicon {  margin-bottom: 10px;margin-right: 10px;}

small {
display: block;
line-height: 1.428571429;
color: #999;
}

</style>


	</head>
	<body>
	
		<!-- Header --> 
		<header class="site-header header-s1 is-sticky">
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
							<div class="col-sm-6">
									<ul class="social">
										<li><a href="#"><em class="fa fa-facebook"></em></a></li>
										<li><a href="#"><em class="fa fa-twitter"></em></a></li>
										<li><a href="#"><em class="fa fa-linkedin"></em></a></li>
										<li><a href="#"><em class="fa fa-google-plus"></em></a></li>
									</ul>
								</div>
						@php
								$data = Auth::id();
						@endphp
						<div class="col-sm-6 al-right">
							<ul class="top-nav">
							@if($data != NULL )
							<li class="nav-item dropdown">
									<a id="navbarDropdown" class="btn btn-info" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
											{{ Auth::user()->email }} 
									</a>

								
											<a class="btn btn-danger" href="{{ route('logout') }}"
												 onclick="event.preventDefault();
																			 document.getElementById('logout-form').submit();">
													{{ __('Logout') }}
											</a>

											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
													@csrf
											</form>
							</li>
							@else 
							<li><a class="btn btn-warning" href="{{ URL::to('/login')}}">Login</a></li>
							<li><a class="btn btn-primary" href="{{ URL::to('/registration/pages') }}">Members Register</a></li>
							<li><a class="btn btn-info" href="{{ URL::to('/registration/pages/employee') }}">Employees Register</a></li>
							

							@endif 
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
			<!-- Navbar -->
			<div class="navbar navbar-primary">
				<div class="container relative">
					<!-- Logo -->
					<a class="navbar-brand" href="index.html">
						<img class="logo logo-dark" alt="logo" src="{{ asset('images/cropped-Logo-Final-Masum.png') }}" height="120" width="100%">
					</a>
					<!-- #end Logo -->
				
					<!-- MainNav -->
					<nav class="navbar-collapse collapse" id="mainnav">
						<ul class="nav navbar-nav">
						<li><a href="{{ URL::to('/home') }}"> Home </a></li>
						<li><a href="{{ URL::to('/about')}}"> About Us </a></li>
						
							<li class="dropdown"><a href="#" class="dropdown-toggle">Blogs  <b class="caret"></b></a>
								<ul class="dropdown-menu">
									
								<li><a href="{{ URL::to('/sipeaa/blog') }}">SIPEAA Articles </a></li>
									<li><a href="{{ URL::to('/blog_admin/add_post') }}">Post Articles </a></li>
								<li><a href="{{ URL::to('/article/borad') }}">Articles Board </a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle">Jobs  <b class="caret"></b></a>
								<ul class="dropdown-menu">
									
								<li><a href="{{ URL::to('/all/jobs') }}">All Jobs </a></li>
								<li><a href="{{URL::to('/post/jobs') }}">Job Posting </a></li>
									<li><a href="#">Job Posting Board </a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle">Members  <b class="caret"></b></a>
								<ul class="dropdown-menu">
									
									<li><a href="#">Membership</a></li>
									<li><a href="#">Member Profile</a></li>
									<li><a href="#">Member's Search </a></li>
									<li><a href="#">Library Upload </a></li>
									<li><a href="#">Accounts SIPEAA </a></li>
									<li><a href="#">Alumni Members Contribution </a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle">T & D  <b class="caret"></b></a>
								<ul class="dropdown-menu">
									
									<li><a href="#">Training/Workshop </a></li>
									<li><a href="#">Training Demand Form </a></li>
									<li><a href="#">Training Posting</a></li>
									<li><a href="#">Course Posting Board </a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle"> Events & Gallery  <b class="caret"></b></a>
								<ul class="dropdown-menu">
									
									<li><a href="#">All Events </a></li>
									<li><a href="#">Events Upload </a></li>
									<li><a href="#">Feature Events uploader </a></li>
									<li><a href="#">Event Board </a></li>
								</ul>
							</li>
							
						</ul>
					</nav>
					<!-- #end MainNav -->
				</div>
			</div>
            <!-- End Navbar -->
            
		@yield('content')
		

		
       	<!-- Section Footer -->
		<div class="footer-section section section-pad-md light bg-footer">
			<div class="imagebg footerbg">
				<img src="images/footer-bg.png" alt="footer-bg">
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 wgs-box res-m-bttm-lg">
						<!-- Each Widget -->
						<div class="wgs-footer wgs-menu">
							<h5 class="wgs-title ucap">Services</h5>
							<div class="wgs-content">
								<ul class="menu">
									<li><a href="#">DEMO</a></li>
									<li><a href="#">DEMO</a></li>
									<li><a href="#">DEMO</a></li>
									<li><a href="#">DEMO</a></li>
									<li><a href="#">DEMO</a></li>
							
								</ul>
							</div>
						</div>
						<!-- End Widget -->
					</div>
					<div class="col-md-3 col-sm-6 wgs-box res-m-bttm-lg">
						<!-- Each Widget -->
						<div class="wgs-footer wgs-menu">
							<h5 class="wgs-title ucap">Information</h5>
							<div class="wgs-content">
								<ul class="menu">
									<li><a href="#">Payment Options</a></li>
									<li><a href="#">Fee Schedule</a></li>
									<li><a href="#">Getting Started</a></li>
									<li><a href="#">Identity Verification Guide</a></li>
									<li><a href="#">Card Verification Guide</a></li>
								</ul>
							</div>
						</div>
						<!-- End Widget -->
					</div>
					<div class="col-md-3 col-sm-6 wgs-box res-m-bttm-lg">
						<!-- Each Widget -->
						<div class="wgs-footer wgs-post">
							<h5 class="wgs-title ucap">Recent Blog</h5>
							<div class="wgs-content">
								<div class="wgs-post-single">
									<div class="wgs-post-thumb">
										<img src="images/post-thumb-sm-b.jpg" alt="post-thumb">
									</div>
									<div class="wgs-post-entry">
										<h6 class="wgs-post-title"><a href="blog-single.html">Working Hard to Keep Pace with Demand </a></h6>
										<span class="wgs-post-meta">December 19, 2017</span>
									</div>
								</div>
								<div class="wgs-post-single">
									<div class="wgs-post-thumb">
										<img src="images/post-thumb-sm-c.jpg" alt="post-thumb">
									</div>
									<div class="wgs-post-entry">
										<h6 class="wgs-post-title"><a href="blog-single.html">Working Hard to Keep Pace with Demand </a></h6>
										<span class="wgs-post-meta">December 19, 2017</span>
									</div>
								</div>
							</div>
						</div>
						<!-- End Widget -->
					</div>
					<div class="col-md-3 col-sm-6 wgs-box res-m-bttm">
						<!-- Each Widget -->
						<div class="wgs-footer wgs-contact">
							<h5 class="wgs-title ucap">get in touch</h5>
							<div class="wgs-content">
								<ul class="wgs-contact-list">
									<li><span class="pe pe-7s-map-marker"></span>217 Summit Boulevard <br/>Birmingham, AL 35243</li>
									<li><span class="pe pe-7s-call"></span>Telephone : (123) 4567 8910 <br/>Telephone : (123) 1234 5678</li>
									<li><span class="pe pe-7s-global"></span>Email : <a href="mailto:info@sitename.com">info@sitename.com</a> <br/>Web : <a href="http://example.com">www.example.com</a></li>
								</ul>
							</div>
						</div>
						<!-- End Widget -->
					</div>
				</div>
			</div>	
		</div>
		<!-- End Section -->
		
		<!-- Copyright -->
		<div class="copyright light">
			<div class="container">
				<div class="row">
					<div class="site-copy col-sm-7">
						<p>Copyright &copy; Softnio</a></p>
					</div>
					<div class="col-sm-5 text-right mobile-left">
						<ul class="social">
							<li><a href="#"><em class="fa fa-facebook"></em></a></li>
							<li><a href="#"><em class="fa fa-twitter"></em></a></li>
							<li><a href="#"><em class="fa fa-linkedin"></em></a></li>
							<li><a href="#"><em class="fa fa-google-plus"></em></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- End Copyright -->
		
		<!-- Preloader !remove please if you do not want -->
		<div id="preloader"><div id="status">&nbsp;</div></div>
		<!-- Preloader End -->
		
		<!-- JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		
		<script src="{{ asset('assets/js/jquery.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slim.min.js') }}"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
				
		
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ce6db569e86a489"></script>

	</body>
</html>
