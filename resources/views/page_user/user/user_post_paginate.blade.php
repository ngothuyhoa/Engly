
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">List Post</a>
  </li>
  
  @if($auth && $auth->username == $user->username)
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Public</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Draft</a>
  </li>
  @endif
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
            <a href="{{ route('user_detail', $post->user->username)}}">
                <small>
                <i class="fa fa-user" data-original-title="" title=""></i>
                    {{ $post->user->username }}
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
    </div>
    @if($auth && $auth->username == $user->username)
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        @foreach($postPublic as $postP)
        <div class="media">
            <a href="{{ route('post_detail', $post->slug) }}">
                <div class="media-left media-post">
                    @if(count($postP->images))
                        @foreach($postP->images as $image)
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
                <h6 class="media-heading">{{ $postP->title }}</h6>
            </a>
            <a href="{{ route('user_detail', $post->user->username)}}">
                <small>
                <i class="fa fa-user" data-original-title="" title=""></i>
                    {{ $postP->user->username }}
                </small>
            </a>
            <p>
                <small>
                    <i class="fa fa-calendar" data-original-title="" title=""></i>
                    {{ $postP->updated_at }}
                </small>
                <small>
                    <i class="fa fa-eye" data-original-title="" title="" style="padding-left: 20px"></i>
                    {{ $postP->view }}
                </small>
                <small>
                    <i class="fa fa-heart" data-original-title="" title="" style="padding-left: 20px"></i>
                    {{ $postP->vote }}
                </small>
            </p>
            </div>
        </div>
        @endforeach
         <hr> 
        <div class="row">
            <div class="col col-xs-8">
                <ul class="pagination pull-right">
                    {!!$postPublic->links()!!}
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        @foreach($postDraft as $postD)
        <div class="media">
            <a href="{{ route('post_detail', $post->slug) }}">
                <div class="media-left media-post">
                    @if(count($postD->images))
                        @foreach($postD->images as $image)
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
                <h6 class="media-heading">{{ $postD->title }}</h6>
            </a>
            <a href="{{ route('user_detail', $post->user->username)}}">
                <small>
                <i class="fa fa-user" data-original-title="" title=""></i>
                    {{ $postD->user->username }}
                </small>
            </a>
            <p>
                <small>
                    <i class="fa fa-calendar" data-original-title="" title=""></i>
                    {{ $postD->updated_at }}
                </small>
                <small>
                    <i class="fa fa-eye" data-original-title="" title="" style="padding-left: 20px"></i>
                    {{ $postD->view }}
                </small>
                <small>
                    <i class="fa fa-heart" data-original-title="" title="" style="padding-left: 20px"></i>
                    {{ $postD->vote }}
                </small>
            </p>
            </div>
        </div>
        @endforeach
         <hr> 
        <div class="row">
            <div class="col col-xs-8">
                <ul class="pagination pull-right">
                    {!!$postDraft->links()!!}
                </ul>
            </div>
        </div>
    </div>
    @endif
</div>

