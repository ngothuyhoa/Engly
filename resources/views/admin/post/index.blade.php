@extends('admin.layout.index')
@section('admin_content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Post</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Admin</a></li>
					<li class="breadcrumb-item active">List Post</li>
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
					<h2 class="card-title text-center">List Post</h2>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<colgroup>
                            <col style="width: 10%; min-width: 10%;">
                            <col style="width: 50%; min-width: 50%;">
                            <col style="width: 5%; min-width: 5%;">
                            <col style="width: 5%; min-width: 5%;">
                            <col style="width: 5%; min-width: 5%;">
                            <col style="width: 10%; min-width: 10%;">
                            <col style="width: 15%; min-width: 15%;">
                        </colgroup>
						<thead>
							<tr>
								<th>Username</th>
								<th>Title</th>
								<th class="text-center">View</th>
								<th class="text-center">Vote</th>
								<th class="text-center">Status</th>
								<th class="text-center">Date</th>
								<th class="text-center">Tuy chinh</th>
							</tr>
						</thead>
						<tbody>
							@foreach($posts as $post)
							<tr>
								<td>{{ $post->user->username }}</td>
								<td>{{ $post->title }}</td>
								<td class="text-center">{{ $post->view }}</td>
								<td class="text-center">{{ $post->vote }}</td>
								<td class="text-center">
									@if($post->status == 1)
									Public
									@else
									Draft
									@endif
								</td>
								<td>{{ $post->updated_at }}</td>
								<td class="text-center">
									<a href="" class="btn btn-warning m-btn m-btn--icon m-btn--icon-only">
                            		<i class="fa fa-edit"></i>
                        			</a>
                        			<a href="" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only">
                            		<i class="fa fa-trash"></i>
                        			</a>
								</td>
							</tr>
							@endforeach
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