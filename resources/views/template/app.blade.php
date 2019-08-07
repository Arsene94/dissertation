<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
	<head>
		<!-- Basic -->
		<title>QAPAR | @yield('title')</title>
		
		<!-- Define Charset -->
		<meta charset="utf-8">

		<!-- Responsive Metatag -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- Page Description and Author -->
		<meta name="description" content="Q&A, polls and audience response platform.">
		<meta name="author" content="Shahriyar Ahmed | Arsene Claudiu Ion">
		<meta property="og:title" content="QAPAR">
		<meta property="og:description" content="Q&A, Polls and audience response platform.">
		<meta property="og:image" content="http://termoclimavent.ro/dis/public/images/preview.jpg">
		<meta property="og:url" content="http://termoclimavent.ro/dis/public/">

		<!-- Bootstrap CSS  -->
		<link rel="stylesheet" href="{{ url('/') }}/bootstrap/css/bootstrap.min.css" type="text/css">

		<!-- Font Awesome CSS -->
		<link rel="stylesheet" href="{{ url('/') }}/font-awesome/css/all.min.css" type="text/css">

		<!-- Font Awesome JS -->
		<script src="{{ url('/') }}/font-awesome/all.min.js"></script>

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="{{ url('/') }}/css/owl.carousel.css" type="text/css">
		<link rel="stylesheet" href="{{ url('/') }}/css/owl.theme.css" type="text/css">
		<link rel="stylesheet" href="{{ url('/') }}/css/owl.transitions.css" type="text/css">
		
		<!-- Css3 Transitions Styles  -->
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/animate.css">
		
		<!-- Lightbox CSS -->
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/lightbox.css">

		<!-- Sulfur CSS Styles  -->
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/style.css">

		<!-- Responsive CSS Style -->
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/responsive.css">

		<!-- Rating CSS Style -->
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/star-rating-svg.css">
		
		@yield('css')

		@yield('js')

		<script src="{{ url('/') }}/js/modernizrr.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
		<script src="{{asset('js')}}/jquery.star-rating-svg.js"></script>

		<script>
			$(document).ready(function(){
				$('span.tabs li a').click(function(){
					var tab_id = $(this).attr('data-tab');
					$('span.tabs li a').removeClass('current');
					$('.tab-content').removeClass('current');
					$(this).addClass('current');
					$("#"+tab_id).addClass('current');
				})

				$('span.tabs2 li a').click(function(){
					var tab_id = $(this).attr('data-tab');
					$('span.tabs2 li a').removeClass('current');
					$('.tab-content').removeClass('current');
					$(this).addClass('current');
					$("#"+tab_id).addClass('current');
				})
			})
		</script>
	</head>

	<body>
		<header class="clearfix">
			<!-- Start Top Bar -->
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="top-bar">
							<div class="row">
									
								<div class="col-md-6">
									<!-- Start Contact Info -->
									<ul class="contact-details">
										<li><a href="#"><i class="fa fa-phone"></i> +12 345 678 000</a>
										</li>
										<li><a href="#"><i class="far fa-envelope"></i> contact@qapar.co.uk</a>
										</li> 
									</ul>
									<!-- End Contact Info -->
								</div><!-- .col-md-6 -->
								
								<!-- Start Social Links -->
								<!--
								<div class="col-md-6">
									
									<ul class="social-list">
										<li>
											<a href="#"><i class="fa fa-rss"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-facebook"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-twitter"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-google-plus"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-youtube"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-linkedin"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-flickr"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-vimeo-square"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-skype"></i></a>
										</li>
									</ul>
									
								</div><!-- .col-md-6 -->
								<!-- End Social Links -->
							</div>
								
								
						</div>
					</div>
				</div><!-- .row -->
			</div><!-- .container -->
			<!-- End Top Bar -->
		
			<!-- Start  Logo & Naviagtion  -->
			<div class="navbar navbar-default navbar-top">
				<div class="container">
					<div class="navbar-header">
						<!-- Stat Toggle Nav Link For Mobiles -->
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<i class="fa fa-bars"></i>
						</button>
						<!-- End Toggle Nav Link For Mobiles  qapar.co.uk-->
						
						<a class="navbar-brand" href="{{route('home.welcome')}}">QAPAR</a>
					</div>
					<div class="navbar-collapse collapse">
							<nav class="signup-form-nav js-main-nav">
						<!-- Start Navigation List -->
						<ul class="nav navbar-nav navbar-right signup-form-nav__list js-signin-modal-trigger">
							@if (!Auth::check())
							<li><a @if(trim($__env->yieldContent('title')) == 'Home') class="active" @endif href="{{route('home.welcome')}}">Home</a></li>
                            
							<li><a @if(trim($__env->yieldContent('title')) == 'About US') class="active" @endif href="{{route('home.aboutus')}}">About Us</a></li>
                            
                            <li><a @if(trim($__env->yieldContent('title')) == 'FAQ') class="active" @endif href="{{route('home.faq')}}">FAQ</a></li>
                            
                            <li><a @if(trim($__env->yieldContent('title')) == 'Documentation') class="active" @endif href="{{route('doc.documentation')}}">Documentation</a></li>
                            
							<!--<li><a href="#">Blog</a>
								<ul class="dropdown">
									<li><a href="#">Item Page</a></li>
								</ul>
							</li>-->
							<li><a @if(trim($__env->yieldContent('title')) == 'Contact') class="active" @endif href="{{route('home.contact')}}">Contact</a></li>
                            
                            <li><a href="{{route('login')}}">Login</a></li>
							<li><a href="{{route('register')}}">Sign Up</a></li>
							@else
							@if(trim($__env->yieldContent('title')) != 'Dashboard')
							<li><a href="{{route('event.index')}}" data-tab="events">Events</a></li>
							<li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
							@else
							<span class="tabs">
								<li><a class="current" data-tab="events">Events</a></li>
								<li><a data-tab="analytics">Analytics</a></li>
								<li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
							</span>
							@endif
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
							@endif
						</nav>
						</ul>
						<!-- End Navigation List -->
					</div>
				</div>
			</div>

			@if(trim($__env->yieldContent('title')) == 'Polls')
				<div class="navbar navbar-default navbar-top">
					<div class="container">
						<div class="navbar-header">
							<!-- Stat Toggle Nav Link For Mobiles -->
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<i class="fa fa-bars"></i>
							</button>
							<!-- End Toggle Nav Link For Mobiles  qapar.co.uk-->
							
						</div>
						<div class="navbar-collapse collapse">
								<nav class="signup-form-nav js-main-nav">
							<!-- Start Navigation List -->
							<ul class="nav navbar-nav navbar-right signup-form-nav__list js-signin-modal-trigger">
								<span class="tabs2">
									<li><a class="current" data-tab="polls">Polls</a></li>
									<li><a data-tab="poll_analytics">Analytics</a></li>
								</span>
							</ul>
						</div>
					</div>
				</div>
			@endif
			<!-- End Header Logo & Naviagtion -->
		</header>
		
		
        
        @yield('content')

		<!-- Start Client Section -->
		<!--<div id="client-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="client-box">
							<ul class="client-list">
								<li><a href="#"><img src="images/clients/client.png" class="img-responsive" alt="Clients Logo"></a></li>
								<li><a href="#"><img src="images/clients/client.png" class="img-responsive" alt="Clients Logo"></a></li>
								<li><a href="#"><img src="images/clients/client.png" class="img-responsive" alt="Clients Logo"></a></li>
								<li><a href="#"><img src="images/clients/client.png" class="img-responsive" alt="Clients Logo"></a></li>
								<li><a href="#"><img src="images/clients/client.png" class="img-responsive" alt="Clients Logo"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- End Client Section -->

		<!-- Start Footer Section -->
		<section id="footer-section" class="footer-section">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="section-heading-2">
							<h3 class="section-title">
								<span>Office Address</span>
							</h3>
						</div>
						
						<div class="footer-address">
							<ul>
								<li class="footer-contact"><i class="fa fa-home"></i> 123, Second Street name, Address</li>
								<li class="footer-contact"><i class="fa fa-envelope"></i><a href="#"> contact@qapar.co.uk</a></li>
								<li class="footer-contact"><i class="fa fa-phone"></i> +1 (123) 456-7890</li>
								<li class="footer-contact"><i class="fa fa-globe"></i> <a href="#" target="_blank">www.qapar.co.uk</a></li>
							</ul>
						</div>
					</div><!--/.col-md-3 -->

					<div class="col-md-3">
						<!--<div class="section-heading-2">
							<h3 class="section-title">
								<span>Latest Tweet</span>
							</h3>
						</div>
						
						<div class="latest-tweet">
							<div class="media">
								<div class="media-left">
									<i class="fab fa-twitter"></i>
								</div>
								<div class="media-body">
									<h4 class="media-heading">About 15 days ago</h4>
									<p>Finally #tutsplus start a tutorial on A Beginner’s Guide to Using #joomla . Check it out here http://t.co/i6S4zeW8Z0</p>
								</div>
							</div>
						</div>-->
					</div><!--/.col-md-3 -->

					<div class="col-md-3">
						<!--<div class="section-heading-2">
							<h3 class="section-title">
								<span>FLICKR STREAM</span>
							</h3>
						</div>
						
						<div class="flickr-widget">
							<ul class="flickr-list">
								<li>
									<a href="images/portfolio/img1.jpg" data-lightbox="picture-1">
										<img src="images/portfolio/img1.jpg" alt="" class="img-responsive">
									</a>
								</li>
								<li>
									<a href="images/portfolio/img2.jpg" data-lightbox="picture-2">
										<img src="images/portfolio/img2.jpg" alt="" class="img-responsive">
									</a>
								</li>
								<li>
									<a href="images/portfolio/img3.jpg" data-lightbox="picture-3">
										<img src="images/portfolio/img3.jpg" alt="" class="img-responsive">
									</a>
								</li>
								<li>
									<a href="images/portfolio/img4.jpg" data-lightbox="picture-4">
										<img src="images/portfolio/img4.jpg" alt="" class="img-responsive">
									</a>
								</li>
								<li>
									<a href="images/portfolio/img5.jpg" data-lightbox="picture-5">
										<img src="images/portfolio/img5.jpg" alt="" class="img-responsive">
									</a>
								</li>
								<li>
									<a href="images/portfolio/img6.jpg" data-lightbox="picture-6">
										<img src="images/portfolio/img6.jpg" alt="" class="img-responsive">
									</a>
								</li>
								<li>
									<a href="images/portfolio/img1.jpg" data-lightbox="picture-7">
										<img src="images/portfolio/img1.jpg" alt="" class="img-responsive">
									</a>
								</li>
								<li>
									<a href="images/portfolio/img2.jpg" data-lightbox="picture-8">
										<img src="images/portfolio/img2.jpg" alt="" class="img-responsive">
									</a>
								</li>
							</ul>
						</div>
					</div>--><!--/.col-md-3 -->
				</div>  <!--/.row -->

				<div class="col-md-3">
					<div class="section-heading-2">
						<h3 class="section-title">
							<span>Stay With us</span>
						</h3>
					</div>
					<div class="subscription">
						<p></p>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Your E-mail" id="name" required data-validation-required-message="Please enter your name.">
							<input type="submit" class="btn btn-primary" value="Subscribe">
						</div>
					</div>
				</div>
			</div><!-- /.container -->
		</section>
		<!-- End Footer Section -->

		<!-- Start CCopyright Section -->
		<div id="copyright-section" class="copyright-section">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="copyright">
							Copyright © 2019 <a href="#">qapar.co.uk</a>. All Rights Reserved. Design by <a href="http://www.themefisher.com">Themefisher</a>. Backend by <a href="#">Arsene Claudiu Ion</a>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="copyright-menu pull-right">
							<ul>
								<li><a href="{{route('home.welcome')}}" class="active">Home</a></li>
								<li><a href="{{route('home.welcome')}}">qapar.co.uk</a></li>
							</ul>
						</div>
					</div>
				</div><!--/.row -->
			</div><!-- /.container -->
		</div>
		<!-- End CCopyright Section -->

		<!-- Sulfur JS File -->
		<script src="{{ url('/') }}/js/jquery-2.1.3.min.js"></script>
		<script src="{{ url('/') }}/js/jquery-migrate-1.2.1.min.js"></script>
		<script src="{{ url('/') }}/bootstrap/js/bootstrap.min.js"></script>
		<script src="{{ url('/') }}/js/owl.carousel.min.js"></script>
		<script src="{{ url('/') }}/js/jquery.appear.js"></script>
		<script src="{{ url('/') }}/js/jquery.fitvids.js"></script>
		<script src="{{ url('/') }}/js/jquery.nicescroll.min.js"></script>
		<script src="{{ url('/') }}/js/lightbox.min.js"></script>
		<script src="{{ url('/') }}/js/count-to.js"></script>
		<script src="{{ url('/') }}/js/styleswitcher.js"></script>
		
		<script src="{{ url('/') }}/js/map.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script src="{{ url('/') }}/js/script.js"></script> 
		
		@yield('scripts')
	</body>
</html>