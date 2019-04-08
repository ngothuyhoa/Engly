@extends('page_user.layout.index')
@section('content')
<div class="col-lg-12 content-user">
    <div class="content-widget-sidebar">
        <div class="d-flex justify-content-center"> 
        <div class="media">
            <div class="media-left">
              <img src="/assets/img/footer-thumb/1.jpg" class="media-object">
            </div>
            <div class="media-body">
              <h5 class="media-heading">{{ $user->fullname }}</h5>
              <p><a href="">{{ $user->email }}</a></p>
            </div>
        </div>
        <div class="media">
            <div class="media-left">
                <div class="subscribe">
                    <button class="btn btn-info btn-sm follow">
                    + Follow
                    </button>
                </div>
            </div>
        </div>
        </div>
    </div>
    <hr>
    <h3>List Post</h3>
    <div class="content-user-list">
        @include('page_user.post.post_paginate')
    <hr>
    </div>    
</div>

@endsection