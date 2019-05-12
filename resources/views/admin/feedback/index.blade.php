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
						<colgroup>
                            <col style="width: 20%; min-width: 20%;">
                            <col style="width: 60%; min-width: 60%;">
                            <col style="width: 20%; min-width: 20%;">
                        </colgroup>
						<thead>
							<tr>
								<th>Name</th>
								<th>Content</th>
								<th class="text-center">Tuy chinh</th>
							</tr>
						</thead>
						<tbody>
							@foreach($feedbacks as $feedback)
							<tr style="background: white">
								<td><input class="input-feedback" type="text" name="name" value="{{ $feedback->user->username }}"></td>
								<td><textarea class="input-feedback">{{ $feedback->content }}</textarea></td>
								<td class="text-center">
									<a href="" class="btn btn-warning m-btn m-btn--icon m-btn--icon-only">
                            		<i class="fa fa-edit"></i>
                        			</a>
                        			<a href="{{ route('destroy_feedback', $feedback->id) }}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only">
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