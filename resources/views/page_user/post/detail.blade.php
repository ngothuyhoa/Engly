@extends('page_user.layout.index')
@section('content')
<div class="col-lg-12 content-user">
	
    <div class="detail-article">
        <article>
            <div class="row">
                <div class="col-md-3 col-sm-3">
                   	@foreach($post->images as $image)
                    	<img class="img-news" src="{{ $image->url }}">
                     @break
                    @endforeach 
                </div>
                <div class="col-md-9 col-sm-9">
                    <div id="title_news"><h4>{{ $post->title }}</h4></div>
                    <p>
                    	<span class="create-date">{{ $post->user->fullname }}</span>
                    	<span class="create-date" style="font-size: 12px">: {{ $post->user->name }}</span>
                    </p>
                    <span style="font-size: 12px" class="create-date">{{ date('d/m/Y H:i:s', strtotime($post->updated_at)) }}</span>
                </div>
            </div>
            <div class="row share-news">
                <div class="col-md-9 col-sm-9">
                	<a href=""><label class="label label-primary" id="tag">Tags :</label></a>
            		@foreach($post->tags as $tag)
            			<a class="btn btn-light tag_post" href="{{route('find_tag', $tag->slug)}}">{{ $tag->name }}</a>
           			@endforeach
                </div>
                <div class="col-md-3 col-sm-3">
		                <div class="social">
		                    <span> <strong> Share by </strong></span>
		                    <a class="facebook" target="_blank" href=""><img src=""> </a>
		                    <a class="ggplus" target="_blank" href=""> <img src=""></a>
		                </div>
            	
                </div>
            </div>
            
            <div class="content" style="">
                {{ $post->content }}
            </div>
        </article>
    </div> 
    <div class="fb-comments" data-href="{{ url()->current() }}" data-width="850" data-numposts="5"></div>

</div>

@endsection