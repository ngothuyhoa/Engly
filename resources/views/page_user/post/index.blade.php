@extends('page_user.layout.index')
@section('content')
<div class="col-lg-12 content-user">
	<h3>List Post</h3>
    <hr>
    <div class="content-user-list" id="paginate_post">
    @include('page_user.post.post_paginate') 
    </div>
</div>

@endsection