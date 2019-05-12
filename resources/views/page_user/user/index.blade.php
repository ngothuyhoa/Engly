@extends('page_user.layout.index')
@section('content')
<div class="col-lg-12 content-user">
    <div class="content-widget-sidebar">
        <div class="d-flex justify-content-center"> 
        <div class="media">
            <div class="media-left">
                @foreach($user->images as $image)
                    <img src="{{$image->url}}" class="media-object">
                    @break
                @endforeach
            </div>
            <div class="media-body">
              <h5 class="media-heading">{{ $user->fullname }}</h5>
              <p><a href="">{{ $user->email }}</a></p>
            </div>
        </div>
        @if(!$auth || ($auth->username != $user->username))
            <div class="media">
                <div class="media-left">
                    <div class="subscribe">
                        <button class="btn btn-info btn-sm follow">
                        + Follow
                        </button>
                    </div>
                </div>
            </div>
        @endif
        </div>
    </div>
    <div class="content-user-list">
        @include('page_user.user.user_post_paginate')
    </div>    
</div>

@endsection