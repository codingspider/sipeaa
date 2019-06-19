<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>@yield('title', 'SIPEAA | Home')</title>

		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">
        <link rel="shortcut icon" href="{{ asset('images/cropped-Logo-Final-Masum.png') }}">
		<!-- Site Title  -->
		<!-- Favicon -->
		<link rel="apple-touch-icon" href="{{ asset('assets3/img/apple-touch-icon.png') }}">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('assets3/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets3/vendor/fontawesome-free/css/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets3/vendor/animate/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets3/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets3/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets3/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets3/vendor/magnific-popup/magnific-popup.min.css') }}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('assets3/css/theme.css') }}">
		<link rel="stylesheet" href="{{ asset('assets3/css/theme-elements.css') }}">
		<link rel="stylesheet" href="{{ asset('assets3/css/theme-blog.css') }}">
		<link rel="stylesheet" href="{{ asset('assets3/css/theme-shop.css') }}">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="{{ asset('assets3/vendor/rs-plugin/css/settings.css') }}">
		<link rel="stylesheet" href="{{ asset('assets3/vendor/rs-plugin/css/layers.css') }}">
		<link rel="stylesheet" href="{{ asset('assets3/vendor/rs-plugin/css/navigation.css') }}">
		
        <!-- Demo CSS -->
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.min.css') }}"/>


		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{ asset('assets3/css/skins/skin-corporate-3.css') }}"> 

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('assets3/css/custom.css') }}">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet"/>
		<!-- Head Libs -->
		<script src="{{ asset('assets3/vendor/modernizr/modernizr.min.js') }}"></script>
<link  href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

	</head>
	<body>
			@php
			use Illuminate\Support\Facades\Auth;
			$data = Auth::id();
        	@endphp
		<div class="body">
			<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 148, 'stickySetTop': '-148px', 'stickyChangeLogo': true}">
				<div class="header-body border-color-primary border-top-0 box-shadow-none">

					<div class="header-top header-top-default border-bottom-0 border-top-0">
						<div class="container">
							<div class="header-row py-2">
								<div class="header-column justify-content-start">
									<div class="header-row">
										<nav class="header-nav-top">
											<ul class="nav nav-pills text-uppercase text-2">
                                                    @if($data != NULL )
                                                    <li class="nav-item dropdown">
                                                            <a id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                                    {{ Auth::user()->email }} 
                                                            </a>
                        
                                                        
                                                                    <a class="text-danger" href="{{ route('logout') }}"
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
                                                    <li><a class="text-info" href="{{ URL::to('/registration/pages') }}">Members Register</a></li>
                                                    <li><a class="text-info" href="{{ URL::to('/registration/pages/employee') }}">Employees Register</a></li>
                                                    
                        
                                                    @endif 
											</ul>
										</nav>
									</div>
								</div>
								<div class="header-column justify-content-end">
									<div class="header-row">
										<ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean">
											<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
											<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
											<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="header-container container z-index-2">
						<div class="header-row py-2">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo header-logo-sticky-change">
										<a href="index.html">
											<img class="header-logo-sticky opacity-0" alt="Porto" width="100" height="60" data-sticky-width="89" data-sticky-height="43" data-sticky-top="88" src="{{ asset('images/cropped-Logo-Final-Masum.png')}}">
                                        <img class="header-logo-non-sticky opacity-0" alt="Porto" width="100" height="60" src="{{ asset('images/cropped-Logo-Final-Masum.png')}}">
										</a>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<ul class="header-extra-info d-flex align-items-center">
									
										<li>
											<div class="header-extra-info-text">
											<label style="color: blue;">Course Item in Cart {{ Cart::count() }}</label>
												<strong>‎৳ {{ Cart::total() }}</strong>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="header-nav-bar bg-primary" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'background-color': 'transparent'}" data-sticky-header-style-deactive="{'background-color': '#0088cc'}">
						<div class="container">
							<div class="header-row">
								<div class="header-column">
									<div class="header-row justify-content-end">
										<div class="header-nav header-nav-force-light-text justify-content-start py-2 py-lg-3" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'margin-left': '135px'}" data-sticky-header-style-deactive="{'margin-left': '0'}">
											<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
												<nav class="collapse">
													<ul class="nav nav-pills" id="mainNav">
														<li class="dropdown dropdown-full-color dropdown-light">
														<a class="dropdown-item dropdown-toggle active" href="{{ URL('/') }}">
																Home
															</a>
															
														</li>
														<li class="dropdown dropdown-full-color dropdown-light dropdown-mega">
															<a class="dropdown-item dropdown-toggle" href="{{ URL::to('/about') }}">
																About Us
															</a>
															
														</li>
														<li class="dropdown dropdown-full-color dropdown-light">
															<a class="dropdown-item dropdown-toggle" href="#">
																Blog 
															</a>
															<ul class="dropdown-menu">
																
                                                                <li><a class="dropdown-item" href="{{ URL::to('/sipeaa/blog') }}">SIPEAA Articles </a></li>
                                                                <li><a class="dropdown-item" href="{{ URL::to('/blog_admin/add_post') }}">Post Articles </a></li>
                                                                <li><a class="dropdown-item" href="{{ URL::to('/article/borad') }}">Articles Board </a></li>
															</ul>
														</li>
														<li class="dropdown dropdown-full-color dropdown-light">
															<a class="dropdown-item dropdown-toggle" href="#">
																Job  
															</a>
															<ul class="dropdown-menu">
																
                                                                    <li><a class="dropdown-item" href="{{ URL::to('/all/jobs') }}">All Jobs </a></li>
                                                                    <li><a class="dropdown-item" href="{{URL::to('/post/jobs') }}">Job Posting </a></li>
                                                                    <li><a class="dropdown-item" href="#">Job Posting Board </a></li>
															</ul>
														</li>
														<li class="dropdown dropdown-full-color dropdown-light">
															<a class="dropdown-item dropdown-toggle" href="#">
																Members   
															</a>
															<ul class="dropdown-menu">
									@if( $data == NULL)
                                    <li><a class="dropdown-item" href="{{ URL::to('/login')}}">Membership</a></li>
									<li><a class="dropdown-item" href="{{ URL::to('/members/profile')}}">Member Profile</a></li>
									<li><a class="dropdown-item" href="{{ URL::to('/members/search') }}">Member's Search </a></li>
									<li><a class="dropdown-item" href="{{ URL::to('/add/library') }}">Library Upload </a></li>
									<li><a class="dropdown-item" href="{{ URL::to('/acounts/members') }}">Accounts SIPEAA </a></li>
									<li><a class="dropdown-item" href="{{ URL::to('/alumni/contribution') }}">Alumni Members Contribution </a></li>
                                    @else
									<li><a class="dropdown-item" href="{{ URL::to('/members/profile')}}">Member Profile</a></li>
									<li><a class="dropdown-item" href="{{ URL::to('/members/search') }}">Member's Search </a></li>
									<li><a class="dropdown-item" href="{{ URL::to('/add/library') }}">Library Upload </a></li>
									<li><a class="dropdown-item" href="{{ URL::to('/acounts/members') }}">Accounts SIPEAA </a></li>
									<li><a class="dropdown-item" href="{{ URL::to('/alumni/contribution') }}">Alumni Members Contribution </a></li>
									@endif

															</ul>
														</li>
											<li class="dropdown dropdown-full-color dropdown-light">
								<a class="dropdown-item dropdown-toggle" href="#">T & D</a>
					<ul class="dropdown-menu">
						
                            <li><a class="dropdown-item" href="{{URL::to('/training/lists') }}">Training/Workshop </a></li>
                            <li><a class="dropdown-item" href="{{URL::to('/training/demand') }}">Training Demand Form </a></li>
                            <li><a class="dropdown-item" href="{{URL::to('/training/post') }}">Training Posting</a></li>
                            <li><a class="dropdown-item" href="{{ URL::to('/course/posting/board') }}">Course Posting Board </a></li>
					</ul>
														</li>
														<li class="dropdown dropdown-full-color dropdown-light">
															<a class="dropdown-item dropdown-toggle" href="#">
																Events & Galary  
															</a>
															<ul class="dropdown-menu">
																
                                                                    <li><a class="dropdown-item" href="#">Training/Workshop </a></li>
                                                                    <li><a class="dropdown-item" href="#">Training Demand Form </a></li>
                                                                    <li><a class="dropdown-item" href="#">Training Posting</a></li>
                                                                    <li><a class="dropdown-item" href="#">Course Posting Board </a></li>
															</ul>
														</li>
														
														<li class="pull-left">
														<a class="dropdown-item dropdown-toggle pull-left" href="{{ URL::to('show/cart')}}">
																My Cart
															</a>
														
														</li>
														
													</ul>
													
												</nav>
											</div>
											<button class="btn header-btn-collapse-nav my-2" data-toggle="collapse" data-target=".header-nav-main nav">
												<i class="fas fa-bars"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </header>
            
            @yield('content')

			<footer id="footer" class="mt-0">
				<div class="container my-4">
					<div class="row py-5">
						<div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
							<h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Contact Details</h5>
							<p class="text-4 mb-0">Porto Template 123</p>
							<p class="text-4 mb-0">Porto Blvd, Suite</p>
							<p class="text-4 mb-0">New York</p>
						</div>
						<div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
							<h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Opening Hours</h5>
							<p class="text-4 mb-0">Mon-Fri: <span class="text-color-light">8:30 am to 5:00 pm</span></p>
							<p class="text-4 mb-0">Saturday: <span class="text-color-light">9:30 am to 1:00 pm</span></p>
							<p class="text-4 mb-0">Sunday: <span class="text-color-light">Closed</span></p>
						</div>
						<div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
							<h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Call Us Now</h5>
							<p class="text-7 text-color-light font-weight-bold mb-2">(800) 123 4567</p>
							<p class="text-4 mb-0">Sales: <span class="text-color-light">(800) 123 4568</span></p>
						</div>
						<div class="col-md-6 col-lg-3">
							<h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Social Media</h5>
							<ul class="footer-social-icons social-icons m-0">
								<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
								<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
								<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="footer-copyright footer-copyright-style-2 pb-4">
						<div class="py-2">
							<div class="row py-4">
								<div class="col d-flex align-items-center justify-content-center mb-4 mb-lg-0">
									<p>© Copyright 2019. All Rights Reserved.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
		
		<script src="{{ asset('assets3/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
		<script src="{{ asset('assets3/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
		<script src="{{ asset('assets3/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
		<script src="{{ asset('assets3/vendor/popper/umd/popper.min.js') }}"></script>
		<script src="{{ asset('assets3/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets3/vendor/common/common.min.js') }}"></script>
		<script src="{{ asset('assets3/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('assets3/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
		<script src="{{ asset('assets3/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
		<script src="{{ asset('assets3/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
		<script src="{{ asset('assets3/vendor/isotope/jquery.isotope.min.js') }}"></script>
		<script src="{{ asset('assets3/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('assets3/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('assets3/vendor/vide/jquery.vide.min.js') }}"></script>
		<script src="{{ asset('assets3/vendor/vivus/vivus.min.js') }}"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('assets3/js/theme.js') }}"></script>
		
		<!-- Current Page Vendor and Views -->
		<script src="{{ asset('assets3/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
		<script src="{{ asset('assets3/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

		<!-- Current Page Vendor and Views -->
		<script src="{{ asset('assets3/js/views/view.contact.js') }}"></script>
		
		<!-- Theme Custom -->
		<script src="{{ asset('assets3/js/custom.js') }}"></script>
		
		<!-- Theme Initialization Files -->
        <script src="{{ asset('assets3/js/theme.init.js') }}"></script>
        	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
	</body>
</html>
