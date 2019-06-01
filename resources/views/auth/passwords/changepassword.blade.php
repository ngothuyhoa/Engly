@extends('page_user.layout.index')
@section('content')
    <div class="col-lg-12 content-user">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Change password</div>

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
                        <form class="form-horizontal" method="POST" action="{{ route('change_password') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                	<div class="input-group mb-3">
	                                	<div class="input-group-prepend">
										    <span class="input-group-text">Current Password</span>
										</div>
                                    	<input id="current-password" type="password" class="form-control" name="current-password" required>
                                    </div>

                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                	<div class="input-group mb-3">
	                                	<div class="input-group-prepend">
										    <span class="input-group-text">New Password</span>
										</div>
                                    	<input id="new-password" type="password" class="form-control" name="new-password" required>
                                    </div>
                                    @if ($errors->has('new-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12	">
                                	<div class="input-group mb-3">
	                                	<div class="input-group-prepend">
										    <span class="input-group-text">Confirm New Password</span>
										</div>
                                    	<input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-danger">
                                        Change Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection