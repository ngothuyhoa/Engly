<!DOCTYPE HTML>
<html>
	<head>
		<script src="/assets/js/jquery.min.js"></script>
		<script src="/assets/js/bootstrap.min.js"></script>
		<script src="/assets/js/editor.js"></script>
		<script>
			$(document).ready(function() {
				$("#txtEditor").Editor();
			});
		</script>
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="/assets/css/font-awesome.min.css"/>
		<link href="/assets/css/editor.css" type="text/css" rel="stylesheet"/>
		<link rel="stylesheet" href="/assets/css/style.css"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		<title>LineControl | v1.1.0</title>
	</head>
	<body>
		@include('page_user.layout.header')
		<div class="container">
			<div class="row">
						<div class="col-lg-6">
							<div class="form-group" style="padding-top: 100px">
						  	<label for="usr">Title:</label>
						  	<input type="text" class="form-control" id="usr">
							</div>
						</div>
						
						<div class="col-lg-6">
							<div class="form-group" style="padding-top: 100px">
						  	<label for="usr">Title:</label>
						  	<input type="text" class="form-control" id="usr">
							</div>
						</div>
					
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 nopadding">
							<textarea id="txtEditor" style="height: 100%"></textarea> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
