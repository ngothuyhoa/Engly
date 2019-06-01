<!DOCTYPE HTML>
<html>
	<head>
		<title>LineControl | v1.1.0</title>
		
		<!-- include libraries(jQuery, bootstrap) -->
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
		<!-- include summernote css/js-->
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
		<!-- Tag input -->
		<link rel="stylesheet" href="/assets/css/bootstrap-tagsinput.css">
		<link rel="stylesheet" href="/assets/css/style.css">	
	</head>
	<body>
		@include('page_user.layout.header')
		<h3 class="text-center" style="margin-top: 70px">Create new Post</h3>
		<div class="container">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12" id="form-post">
					<form action="{{route('post_store')}}" method="POST" enctype="multipart/form-data">
					        {{ csrf_field() }}

				        <div class="form-group">
				        	<div class="col-md-1" style=" padding-top: 5px; font-weight: bold;">
				        		Title:
				        	</div>
				        	<div class="col-md-5">
				        		<input type="text" name="title" class="form-control" placeholder="Enter Title">
				        	</div>
							
						</div>
						<div class="form-group">

						    <div class="col-md-1" style="text-align: right; padding-top: 5px; font-weight: bold;">
				        		Tag:
				        	</div>
				        	<div class="col-md-4">
				        		<input style="margin-top: 10px;width: 600px" class="typeahead" type="text" data-role="tagsinput" name="tag" placeholder="Enter Tag"/>
				        	</div>    
						    
						</div>
						<div class="col-md-10" style="margin-top: 15px;">
							<textarea name="content" class="summernote" style="width: 80%"></textarea>
						
					    <br>
					    <div class="col-md-1" style="font-weight: bold;"> Image: </div>
					    <div class="col-md-11">
					    	<div class="form-group">
							    <input type="file" class="form-control-file" name="image" accept="image/*">

							</div>
					    </div>
					    <div class="col-md-1" style="font-weight: bold;"> Option: </div>
					    <div class="col-md-11">
					    	<div class="form-group">				                
					            <input type="radio" name="status" value="0" checked>Draft</input>
								<input type="radio" name="status" value="1"> Public </input>               
				        	</div>
					    </div>
					   
				        
					    <button type="submit" class="btn btn-info">Create</button>
					    </div>
					</form>

				</div>
			</div>
		</div>
		<script src="{{ asset('js/app.js') }}" type=text/javascript></script>
		<script src="{{ asset('js/all.js') }}" type=text/javascript></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    
		<!-- Tag Input -->
		<script src="/assets/js/bootstrap-tagsinput.js"></script>
		<script src="/assets/js/typeahead.bundle.js"></script>
		<script>
		        $(document).ready(function() {
		            $('.summernote').summernote();
		        });
		</script>
		
		
	</body>
</html>

