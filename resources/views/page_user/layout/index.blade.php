<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Engly - Pro</title>
	<meta charset="UTF-8">
	<meta name="description" content="Cloud 83 - hosting template ">
	<meta name="keywords" content="cloud, hosting, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
	<!-- Google Font -->
	
	<link rel="stylesheet" href="{{ asset('/css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/blog.css') }}">

	<!-- Stylesheets -->
	<!-- <link rel="stylesheet" href="/assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/assets/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="/assets/css/flaticon.css"/>
	<link rel="stylesheet" href="/assets/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="/assets/css/animate.css"/>
	<link rel="stylesheet" href="/assets/css/style.css"/>
	<link rel="stylesheet" href="/assets/css/blog.css"/> -->


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
	<script src="{{ asset('js/app.js') }}" type=text/javascript></script>
	<script src="{{ asset('js/all.js') }}" type=text/javascript></script>
	<!-- <script src="/assets/js/jquery.min.js"></script> -->
	<!-- <script src="/assets/js/popper.min.js"></script> -->
	<!-- <script src="/assets/js/bootstrap.min.js"></script> -->
	<!-- <script src="/assets/js/owl.carousel.min.js"></script>
	<script src="/assets/js/circle-progress.min.js"></script>
	<script src="/assets/js/main.js"></script>
	<script src="/assets/js/paginate.js"></script> -->
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	<script>
    @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"

        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('message') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>
	
	</body>
</html>
