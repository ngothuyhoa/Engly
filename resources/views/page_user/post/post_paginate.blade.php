@foreach($posts as $post)
<div class="media">
    <a href="{{ route('post_detail', $post->slug) }}">
        <div class="media-left media-post">
            @if(count($post->images))
                @foreach($post->images as $image)
                    <img src="{{ $image->url }}" class="media-object">
                    @break
                @endforeach
            @else
                <img src="assets/img/about.jpg" class="img-responsive">
            @endif
        </div>
    </a>
    <div class="media-body">
    <a href="{{ route('post_detail', $post->slug) }}">
        <h6 class="media-heading">{{ $post->title }}</h6>
    </a>
    <a href="{{ route('user_detail', $post->user->name)}}">
        <small>
        <i class="fa fa-user" data-original-title="" title=""></i>
            {{ $post->user->name }}
        </small>
    </a>
    <p>
        <small>
            <i class="fa fa-calendar" data-original-title="" title=""></i>
            {{ $post->updated_at }}
        </small>
        <small>
            <i class="fa fa-eye" data-original-title="" title="" style="padding-left: 20px"></i>
            {{ $post->view }}
        </small>
        <small>
            <i class="fa fa-heart" data-original-title="" title="" style="padding-left: 20px"></i>
            {{ $post->vote }}
        </small>
    </p>
    </div>
</div>
@endforeach
<hr> 
<div class="row">
    <div class="col col-xs-8">
        <ul class="pagination pull-right">
            {!!$posts->links()!!}
        </ul>
    </div>
</div>



