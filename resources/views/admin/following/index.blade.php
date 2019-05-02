@extends('admin.layout.index')
@section('admin_content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Feedback</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Admin</a></li>
					<li class="breadcrumb-item active">List Feedback</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h2 class="card-title text-center">List Feedback</h2>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Contet</th>
								<th>Tuy chinh</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Hi</td>
								<td>Hi</td>
								<td>
									<a href="" class="btn btn-warning m-btn m-btn--icon m-btn--icon-only">
                            		<i class="fa fa-edit"></i>
                        			</a>
                        			<a href="" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only">
                            		<i class="fa fa-trash"></i>
                        			</a>
								</td>
							</tr>
							
						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
@endsection