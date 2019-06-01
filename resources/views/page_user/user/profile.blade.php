@extends('page_user.layout.index')
@section('content')
<div class="col-lg-12 content-user">
	<div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"><h4>Profile</h4></div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="row">
                    	<div class="col-12 col-sm-6 col-md-6" style="border-right: #dee2e6 solid 1px">
                    	<form method="post" action="{{ route('update_profile', $user->username ) }}" enctype="multipart/form-data">
			 			{{ csrf_field() }}
					    <div class="text-center">
				            <div style="margin-bottom: 10px">
				                @foreach($user->images as $image)
				                    <img src="{{$image->url}}" class="media-object">
				                    @break
				                @endforeach
				            </div>
				            <div>
					            <input type="file" class="form-control-file border" name="image" accept="image/*">
					        </div>
				        </div>
				        <br>
				        <br>
				        <div class="input-group mb-3">
						    <div class="input-group-prepend">
						      <span class="input-group-text"><i class="fa fa-btn fa-user"></i></span>
						    </div>
						    <input type="text" class="form-control" name="fullname" value="{{ $user->fullname }}">
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-info">Update</button>
						</div>
					</form>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                    	<h6 style="text-align: center;">Basic Information </h6>
                    	<hr>
                    	<div class="text-center" style="font-size: 16px; color: gray">
                    		Fullname: {{ $user->fullname }}
	                    	<br>
	                    	Username: {{ $user->username }}
	                    	<br>
	                    	Email: {{ $user->email }}
	                    	<br>
	                    	<a class="btn btn-danger" href="/change_password">Change Password</a>
                    	</div>
                    	
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection