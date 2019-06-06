<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 3 | Data Tables</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="/assets/admin/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="/assets/admin/css/dataTables.bootstrap4.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/assets/admin/css/adminlte.min.css">
	<!-- bootstrap wysihtml5 - text editor -->
  	<link rel="stylesheet" href="/assets/admin/css/bootstrap3-wysihtml5.min.css">
	<!-- Custom css -->
	<link rel="stylesheet" href="/assets/admin/css/admin-blog.css">
	<!-- iCheck for checkboxes and radio inputs -->
  	<link rel="stylesheet" href="/assets/admin/css/all.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
	<!-- Tag input -->
	<link rel="stylesheet" href="/assets/admin/css/bootstrap-tagsinput.css">
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="../../index3.html" class="nav-link">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">Contact</a>
				</li>
			</ul>
			<!-- SEARCH FORM -->
			<form class="form-inline ml-3">
				<div class="input-group input-group-sm">
					<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-navbar" type="submit">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</div>
			</form>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Messages Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="fa fa-comments-o"></i>
						<span class="badge badge-danger navbar-badge">3</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="/assets/admin/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										Brad Diesel
										<span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
									</h3>
									<p class="text-sm">Call me whenever you can...</p>
									<p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="/assets/admin/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										John Pierce
										<span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
									</h3>
									<p class="text-sm">I got your message bro</p>
									<p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="/assets/admin/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										Nora Silvester
										<span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
									</h3>
									<p class="text-sm">The subject goes here</p>
									<p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
					</div>
				</li>
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="fa fa-bell-o"></i>
						<span class="badge badge-warning navbar-badge">15</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<span class="dropdown-item dropdown-header">15 Notifications</span>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fa fa-envelope mr-2"></i> 4 new messages
							<span class="float-right text-muted text-sm">3 mins</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fa fa-users mr-2"></i> 8 friend requests
							<span class="float-right text-muted text-sm">12 hours</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fa fa-file mr-2"></i> 3 new reports
							<span class="float-right text-muted text-sm">2 days</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
						<i class="fa fa-th-large"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="{{ route('home') }}" class="brand-link">
				<img src="/assets/admin/img/AdminLTELogo.png"
				alt="AdminLTE Logo"
				class="brand-image img-circle elevation-3"
				style="opacity: .8">
				<span class="brand-text font-weight-light">AdminLTE 3</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="/assets/admin/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block">{{ Auth::user()->fullname}}</a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item has-treeview">
			          		<a href="{{ route('dashboard') }}" class="nav-link">
			          			<i class="nav-icon fa fa-dashboard"></i>
			          				Dashboard
			          		</a>
			          	</li>
			          	<li class="nav-item has-treeview">
			          		<a href="{{ route('index_post') }}" class="nav-link">
			          			<i class="nav-icon fa fa-pencil"></i>
			          			<p>
			          				Post
			          				<i class="right fa fa-angle-left"></i>
			          			</p>
			          		</a>
			          		<ul class="nav nav-treeview">
			          			<li class="nav-item">
			          				<a href="{{ route('index_post') }}" class="nav-link">
			          					<i class="fa fa-circle-o nav-icon"></i>
			          					<p> List Post</p>
			          				</a>
			          			</li>
			          			<li class="nav-item">
			          				<a href="{{ route('create_post') }}" class="nav-link">
			          					<i class="fa fa-plus-circle nav-icon center"></i>
			          					<p>Create New Post</p>
			          				</a>
			          			</li>
			          		</ul>
			          	</li>
			          	<li class="nav-item has-treeview">
			          		<a href="{{ route('index_user') }}" class="nav-link">
			          			<i class="nav-icon fa fa-user"></i>
			          			<p>
			          				User
			          				<i class="right fa fa-angle-left"></i>
			          			</p>
			          		</a>
			          		<ul class="nav nav-treeview">
			          			<li class="nav-item">
			          				<a href="{{ route('index_user') }}" class="nav-link">
			          					<i class="fa fa-circle-o nav-icon"></i>
			          					<p> List User</p>
			          				</a>
			          			</li>
			          			<li class="nav-item">
			          				<a href="../../index2.html" class="nav-link">
			          					<i class="fa fa-circle-o nav-icon"></i>
			          					<p>Create New Post</p>
			          				</a>
			          			</li>
			          		</ul>
			          	</li>
			          	<li class="nav-item has-treeview">
			          		<a href="{{ route('index_feedback') }}" class="nav-link">
			          			<i class="nav-icon fa fa-file"></i>
			          			<p>
			          				Feedback
			          				<i class="right fa fa-angle-left"></i>
			          			</p>
			          		</a>
			          		<ul class="nav nav-treeview">
			          			<li class="nav-item">
			          				<a href="{{ route('index_feedback') }}" class="nav-link">
			          					<i class="fa fa-circle-o nav-icon"></i>
			          					<p> List Feedback</p>
			          				</a>
			          			</li>
			          			<li class="nav-item">
			          				<a href="../../index2.html" class="nav-link">
			          					<i class="fa fa-circle-o nav-icon"></i>
			          					<p>Create New Post</p>
			          				</a>
			          			</li>
			          		</ul>
			          	</li>
			          	<li class="nav-item has-treeview">
			          		<a href="{{ route('index_report') }}" class="nav-link">
			          			<i class="nav-icon fa fa-flag"></i>
			          			<p>
			          				Report <span class="badge badge-danger"> {{$reportCount}} </span>
			          				<i class="right fa fa-angle-left"></i>
			          			</p>
			          		</a>
			          		<ul class="nav nav-treeview">
			          			<li class="nav-item">
			          				<a href="{{ route('index_report') }}" class="nav-link">
			          					<i class="fa fa-circle-o nav-icon"></i>
			          					<p> List Report</p>
			          				</a>
			          			</li>
			          			<li class="nav-item">
			          				<a href="../../index2.html" class="nav-link">
			          					<i class="fa fa-circle-o nav-icon"></i>
			          					<p>Create New Post</p>
			          				</a>
			          			</li>
			          		</ul>
			          	</li>
			          	<li class="nav-item has-treeview">
			          		<a href="{{ route('index_following') }}" class="nav-link">
			          			<i class="nav-icon fa fa-users"></i>
			          			<p>
			          				Following
			          				<i class="right fa fa-angle-left"></i>
			          			</p>
			          		</a>
			          		<ul class="nav nav-treeview">
			          			<li class="nav-item">
			          				<a href="{{ route('index_following') }}" class="nav-link">
			          					<i class="fa fa-circle-o nav-icon"></i>
			          					<p> List Following</p>
			          				</a>
			          			</li>
			          			<li class="nav-item">
			          				<a href="../../index2.html" class="nav-link">
			          					<i class="fa fa-circle-o nav-icon"></i>
			          					<p>Create New Post</p>
			          				</a>
			          			</li>
			          		</ul>
			          	</li>
			          	
         			 </ul>
      			</nav>
      		<!-- /.sidebar-menu -->
  			</div>
  			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			@yield('admin_content')
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				<b>Version</b> 3.0.0-alpha
			</div>
			<strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
			reserved.
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
		</div>
		<!-- ./wrapper -->

		<!-- jQuery -->
	<script src="/assets/admin/js/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="/assets/admin/js/bootstrap.bundle.min.js"></script>
	<!-- DataTables -->
	<script src="/assets/admin/js/jquery.dataTables.js"></script>
	<script src="/assets/admin/js/dataTables.bootstrap4.js"></script>
	<!-- SlimScroll -->
	<script src="/assets/admin/js/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="/assets/admin/js/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="/assets/admin/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="/assets/admin/js/demo.js"></script>
	<script src="/assets/admin/js/ckeditor.js"></script>
	<!-- iCheck 1.0.1 -->
	<script src="/assets/admin/js/icheck.min.js"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="/assets/admin/js/bootstrap3-wysihtml5.all.min.js"></script>
	<!-- Tag Input -->
	<script src="/assets/admin/js/bootstrap-tagsinput.min.js"></script>
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
	<!-- page script -->
	<script>
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	</script>

	<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor1'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      })

    // bootstrap WYSIHTML5 - text editor

    $('.textarea').wysihtml5({
      toolbar: { fa: true }
    })
  })
</script>


</body>
</html>
