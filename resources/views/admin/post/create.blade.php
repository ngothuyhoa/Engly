@extends('admin.layout.index')
@section('admin_content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>General Form</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">General Form</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
					<!-- general form elements -->
				<div class="card card-default">
					<div class="card-header">
						<h3 class="card-title">Quick Example</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<div class="row justify-content-md-center">
					<div class="col-md-11">
						<form role="form" method="POST" action="{{ route('store_post') }}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="card-body">
								<div class="form-group">
									<label>Title</label>
									<input type="text" class="form-control" placeholder="Enter Title">
								</div>
								<div class="form-group">
								    <label>Tag</label>
								    <input type="text" value="" data-role="tagsinput" class="form-control" name="tag" />
								  </div>
								<div class="card card-outline card-info">
						            <div class="card-header">
						              <h3 class="card-title">
						                Bootstrap WYSIHTML5
						                <small>Simple and fast</small>
						              </h3>
						              <!-- tools box -->
						              <div class="card-tools">
						                <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip"
						                        title="Collapse">
						                  <i class="fa fa-minus"></i></button>
						                <button type="button" class="btn btn-tool btn-sm" data-widget="remove" data-toggle="tooltip"
						                        title="Remove">
						                  <i class="fa fa-times"></i></button>
						              </div>
						              <!-- /. tools -->
						            </div>
						            <!-- /.card-header -->
						            <div class="card-body pad">
						              	<div class="mb-3">
						                <textarea class="textarea" placeholder="Place some text here">
						                          	
						                </textarea>
						              	</div>
						              	<p class="text-sm mb-0">
						                Editor <a href="https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg">Documentation and license
						                information.</a>
						              </p>
						            </div>
	          					</div>
	          					<div class="form-group">
				                  	<label>
				                    	<input type="radio" name="r1" class="minimal" checked>
				                  	</label>
				                  	<label>
				                    	<input type="radio" name="r1" class="minimal">
				                  	</label>
				                  	<label>
				                    	<input type="radio" name="r1" class="minimal" disabled>
				                    	Minimal skin radio
				                  	</label>
				                </div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>
					</div>
				</div>		
			</div>
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
