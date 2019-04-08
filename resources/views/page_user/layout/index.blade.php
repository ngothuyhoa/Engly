<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>IT Host - Hosting Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="Cloud 83 - hosting template ">
	<meta name="keywords" content="cloud, hosting, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/assets/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="/assets/css/flaticon.css"/>
	<link rel="stylesheet" href="/assets/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="/assets/css/animate.css"/>
	<link rel="stylesheet" href="/assets/css/style.css"/>
	<link rel="stylesheet" href="/assets/css/blog.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	
	<!-- Header section -->
	@include('page_user.layout.header')
	<!-- Header section end -->

	<!-- Hero section -->
	@yield('banner')
	<!-- Hero section end -->

	<!-- login -->
    @include('page_user.layout.login')
    <!-- endlogin -->

	<section id="blog-section" >
	    <div class="container">
	       	<div class="row">
	       		<div class="col-lg-9">
	          	@yield('content')
	          </div>
		        @include('page_user.layout.sidebar')
	        </div>
	    </div> 
    </section>
	<!-- footer -->
	@include('page_user.layout.footer')
	<!-- endfooter -->


	<!--====== Javascripts & Jquery ======-->
	<script src="/assets/js/jquery-3.2.1.min.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
	<script src="/assets/js/owl.carousel.min.js"></script>
	<script src="/assets/js/circle-progress.min.js"></script>
	<script src="/assets/js/main.js"></script>
	<script src="/assets/js/paginate.js"></script>

	</body>
</html>
