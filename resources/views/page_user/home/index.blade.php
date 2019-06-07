@extends('page_user.layout.index')
@section('banner')
<section class="hero-section set-bg" data-setbg="assets/img/bg.jpg">
	<div class="container h-100">
		<div class="hero-content text-white">
			<div class="row">
				<div class="col-lg-6 pr-0">
					<h2>Welcome to Engly</h2>
					<p>Một trang web chia sẻ kiến thức , những người biết chia sẻ cho những người không biết, những người không biết học từ những người đã biết. Mọi người có thể học mọi lúc mọi nơi, chia sẻ kiến thức với nhau </p>
					<a href="{{ route('post') }}" class="site-btn">Get to Post</a>
				</div>
			</div>
			<div class="hero-rocket">
				<img src="assets/img/rocket.png" alt="">
			</div>
		</div>
	</div>
</section>
@endsection
@section('content')
	<div class="col-lg-12">
		<h3>Bài viết mới nhất</h3>
		<div class="row post-new">
			@foreach($posts as $post)
	  		<div class="col-lg-4 col-md-4">
	            <aside >
	            	<a href="{{ route('post_detail', $post->slug) }}">
	            	@if(count($post->images))
		            	@foreach($post->images as $image)
		                	<img style="height: 150px; width: 100%" src="{{ $image->url }}" class="img-responsive">
		                	@break
		                @endforeach
		            @else
		            	<img style="height: 150px; width: 100%" src="assets/img/about.jpg" class="img-responsive">
		            @endif

	                <div class="content-title">
						<div class="text-center">
							<h5><a href="{{ route('post_detail', $post->slug) }}">{{ $post->title }}</a></h5>
						</div>
						<hr>
						<small class="count-comment">
							<i class="fa fa-calendar" data-original-title="" title=""></i> {{ $post->updated_at }}
						</small>
						<span class="pull-right">
							<a href="#" data-toggle="tooltip" data-placement="left" title="Comments">	<i class="fa fa-comments" ></i> {{count($post->comments)}}</a>
							<a href="#" data-toggle="tooltip" data-placement="right" title="Eye"><i class="fa fa-eye"></i> {{ $post->view }}</a>                  
						</span>
					</div>
					<div class="content-footer">
						@foreach($post->user->images as $image)
						<img class="user-small-img" src="{{ $image->url }}">
						@break
						@endforeach
						<a href="{{ route('user_detail', $post->user->username)}}">
							<span style="font-size: 12px;color: #fff;">{{ $post->user->fullname }}</span>  	
						</a>                 
					</div>
				</a>
	            </aside>
	        </div>
	        @endforeach
	        <div class="col-md-3 offset-md-10" style="margin-top: 10px"> 
	        	<a style="border: 0px; border-radius: 15px" href="{{ route('post') }}" class="btn btn-primary">Xem Them</a>
	        </div>
		</div>

	</div>
	<div class="col-lg-12">
		<h3>Bài viết nổi bật</h3>
		<div class="row post-new">
		@foreach($featuredPosts as $post)
	  		<div class="col-lg-4 col-md-4">
	            <aside>
	            	<a href="{{ route('post_detail', $post->slug) }}" >
		                @if(count($post->images))
			            	@foreach($post->images as $image)
			                	<img style="height: 150px; width: 100%" src="{{ $image->url }}" class="img-responsive">
			                	@break
			                @endforeach
			            @else
			            	<img style="height: 150px; width: 100%" src="assets/img/about.jpg" class="img-responsive">
			            @endif
		                <div class="content-title">
							<div class="text-center">
								<h5><a href="{{ route('post_detail', $post->slug) }}">{{ $post->title }}</a></h5>
							</div>
							<hr>
							<small class="count-comment">
								<i class="fa fa-calendar" data-original-title="" title=""></i> {{ $post->updated_at }}
							</small>
							<span class="pull-right">
								<a href="#" data-toggle="tooltip" data-placement="left" title="Comments">	<i class="fa fa-eye" ></i>{{ $post->view }}</a>
								<a href="#" data-toggle="tooltip" data-placement="right" title="Loved"><i class="fa fa-comments"></i> {{count($post->comments) }} </a>                  
							</span>
						</div>
						<div class="content-footer">
							@foreach($post->user->images as $image)
							<img class="user-small-img" src="{{ $image->url }}">
							@break
							@endforeach
							<a href="{{ route('user_detail', $post->user->username)}}">
								<span style="font-size: 12px;color: #fff;">{{ $post->user->fullname }}</span>
							</a>                    
						</div>
					</a>
	            </aside>
	        </div>
        @endforeach
        <div class="col-md-3 offset-md-10" style="margin-top: 10px"> 
	        	<a style="border-radius: 15px" href="{{ route('post_featured') }}" class="btn btn-primary">Xem Them</a>
	        </div>
		</div>
	</div>
@endsection

