@extends('page_user.layout.index')
@section('content')
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
<div class="col-lg-12 content-user">
    <div class="detail-article" id="content-post">
        <article>
            <div class="row">
                <div class="col-md-3 col-sm-3">
                   	@foreach($post->images as $image)
                    	<img class="img-news" src="{{ $image->url }}">
                     @break
                    @endforeach 
                </div>
                <div class="col-md-9 col-sm-9">
                    <div id="title_news">
                        {{ $post->title }} 
                        <p>
                        	<span class="create-date">{{ $post->user->fullname }}</span>
                        	| @<span class="create-date" style="font-size: 12px">{{ $post->user->username }}</span>
                             | <span style="font-size: 12px" class="create-date">{{ date('d/m/Y H:i:s', strtotime($post->updated_at)) }}</span>
                        </p>        
                    </div>
                    <div class="row" id="share">
                        @if(Auth::check() && (Auth::user()->username == $post->user->username ||Auth::user()->is_super_admin == 1))
                        <div class="col-md-1 col-sm-1" >
                            <div class="dropdown" id="edit">
                                <button class="btn" type="button" data-toggle="dropdown" style="margin-right:20px; font-size: 24px; background: white; color: orange">
                                 <i class="fa fa-edit"></i>
                                </button>
                                <ul class="dropdown-menu" style="padding-left: 20px">
                                    <li>
                                        <form method="post" action="{{ route('post_public', $post->id) }}">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <button class="edit-button" type="submit">Public</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form method="post" action="{{ route('post_draft', $post->id) }}">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <button class="edit-button">Draft</button>
                                        </form>
                                    </li>
                                    <li><a style="padding-left: 8px" class="edit-button" href="{{ route('post_edit', $post->slug) }}">Edit</a></li>
                                    <li>
                                        <form method="post" action="{{ route('post_destroy', $post->id) }}">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <button class="edit-button">Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endif
                        @if($post->status == 0)
                        <div class="col-md-1 col-sm-1" style="padding-top: 13px ">
                            <i class="fa fa-lock"></i>  
                        </div>
                        @endif
                        
                        <div class="col-md-3 col-sm-3 offset-md-7">
                            <div class="social">
                                <a class="facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><i class="fa fa-facebook-f"></i></a>
                                <a class="ggplus" target="_blank" href="https://plus.google.com/share?url={{ url()->current() }}"> <i class="fa fa-google-plus"></i></a>
                                
                               <a style="background: white; color: black;" href="{{ route('report_create', $post->id) }}"  class="btn btn-light"> <i style="font-size: 25px" class="fa fa-flag"></i></a> 
                            </div> 
                        </div>
                    </div>                      
                </div>
            </div>

            <div class="row share-news">
                <div class="col-md-12 col-sm-12">
                	<a href=""><label class="label label-primary" >Tags :</label></a>
            		@foreach($post->tags as $tag)
            			<a id="tag" class="btn btn-outline-info" href="{{route('find_tag', $tag->slug)}}">{{ $tag->name }}</a>
           			@endforeach
                </div>
            </div>
            
            <div class="content" style="">
                {!! $post->content !!}
            </div>
        </article>
    </div> 
 
    @include('page_user.comment.comment')
</div>

@endsection