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
					<li class="breadcrumb-item active">List Report</li>
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
					<h2 class="card-title text-center">List Report</h2>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>STT</th>
								<th>Name</th>
								<th>Post</th>
								<th>Note</th>
								<th>Status</th>
								<th>Tuy chinh</th>
							</tr>
						</thead>
						<tbody>
							@foreach($reports as $report)
							<tr>
								<td>{{ $report->user->id }}</td>
								<td>{{ $report->user->fullname }}</td>
								<td><a href="{{ route('post_detail', $report->post->slug) }}">{{ $report->post->title }}</a></td>
								<td>{{ $report->note}}</td>
								<td>
									@if($report->status == 0)
									<form action="{{ route('report_update', $report->id) }}" method="post">
										@csrf
										<button type="submit" class="btn btn-warning">Chưa duyệt</button>
	                        			</a>
									</form>
									@else
										<form action="{{ route('report_update', $report->id) }}" method="post">
										@csrf
										<button type="submit" class="btn btn-success">Đã duyệt</button>
	                        			</a>
									</form>
									@endif
								</td>
								<td>
									<form method="post" action="{{ route('destroy_report', $report->id) }}">
										@csrf
										<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
									</form>
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