@extends('page_user.layout.index')
@section('content')
<div class="col-lg-12 content-user" style="background: white">
    <div class="content-widget-sidebar">
        <div class="d-flex justify-content-center"> 
        <div class="media">
            <div class="media-left">
                @foreach($user->images as $image)
                    <img  src="{{$image->url}}" class="media-object">
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
                    <div class="subscribe" style="margin-left: 10px">
                        @if (auth()->check() && auth()->user()->isFollowing($user->id))         
                        <form action="{{route('unfollow', ['id' => $user->id])}}" method="POST">
                            {{ csrf_field() }}

                            <button type="submit" id="delete-follow-{{ $user->id }}" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Unfollow
                            </button>
                        </form>
                        @else
                        <form action="{{route('follow', ['id' => $user->id])}}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" id="follow-user-{{ $user->id }}" class="btn btn-success">
                                <i class="fa fa-btn fa-user"></i>Follow
                            </button>
                        </form>
                        @endif
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