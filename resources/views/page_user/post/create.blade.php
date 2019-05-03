<!DOCTYPE HTML>
<html>
	<head>
		<title>LineControl | v1.1.0</title>
		
		<!-- include libraries(jQuery, bootstrap) -->
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
		<!-- include summernote css/js-->
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
		<!-- Tag input -->
		<link rel="stylesheet" href="/assets/admin/css/bootstrap-tagsinput.css">
		
		
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<form action="{{route('post_store')}}" method="POST">
					        {{ csrf_field() }}
				        <div class="form-group">
							<label>Title</label>
							<input type="text" name="title" class="form-control" placeholder="Enter Title">
						</div>
						<div class="form-group">
						    <label>Tag</label>
						    <input type="text" value="" data-role="tagsinput" class="form-control" name="tag" />
						</div>
					    <textarea name="summernoteInput" class="summernote"></textarea>
					    <br>
					    <button type="submit">Submit</button>
					</form>
				</div>
			</div>
		</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    
		<!-- Tag Input -->
		<script src="/assets/admin/js/bootstrap-tagsinput.min.js"></script>
		<script>
		        $(document).ready(function() {
		            $('.summernote').summernote();
		        });
		</script>
	</body>
</html>

