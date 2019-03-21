@extends('page_user.layout.index')
@section('banner')
<section class="hero-section set-bg" data-setbg="assets/img/bg.jpg">
	<div class="container h-100">
		<div class="hero-content text-white">
			<div class="row">
				<div class="col-lg-6 pr-0">
					<h2>Unbeatable Offers</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. </p>
					<a href="#" class="site-btn">Get your plan</a>
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
	            	<a href="#">
	            	@if(count($post->images))
		            	@foreach($post->images as $image)
		                	<img src="{{ $image->url }}" class="img-responsive">
		                	@break
		                @endforeach
		            @else
		            	<img src="assets/img/about.jpg" class="img-responsive">
		            @endif

	                <div class="content-title">
						<div class="text-center">
							<h5><a href="#">{{ $post->title }}</a></h5>
						</div>
						<hr>
						<small class="count-comment">
							<i class="fa fa-calendar" data-original-title="" title=""></i> {{ $post->updated_at }}
						</small>
						<span class="pull-right">
							<a href="#" data-toggle="tooltip" data-placement="left" title="Comments">	<i class="fa fa-comments" ></i> 3</a>
							<a href="#" data-toggle="tooltip" data-placement="right" title="Eye"><i class="fa fa-eye"></i> {{ $post->view }}</a>                  
						</span>
					</div>
					<div class="content-footer">
						@foreach($post->user->images as $image)
						<img class="user-small-img" src="{{ $image->url }}">
						@break
						@endforeach
						<span style="font-size: 12px;color: #fff;">{{ $post->user->name }}</span>		                    
					</div>
				</a>
	            </aside>
	        </div>
	        @endforeach
	        <div class="col-md-3 offset-md-10" class="view-all"> 
	        	<a href="{{ route('post') }}" type="button" class="btn btn-primary">Xem Them</a>
	        </div>
	        
		</div>

	</div>
	<div class="col-lg-12">
		<h3>Bài viết nổi bật</h3>
		<div class="row post-new">
  		<div class="col-lg-4 col-md-4">
            <aside>
            	<a href="#" >
                <img src="https://lh3.googleusercontent.com/-ndZJOGgvYQ4/WM1ZI8dH86I/AAAAAAAADeo/l67ZqZnRUO8QXIQi38bEXuxqHfVX0TV2gCJoC/w424-h318-n-rw/thumbnail8.jpg" class="img-responsive">
                <div class="content-title">
					<div class="text-center">
						<h5><a href="#">Niki Postingan Sing Kepisan Njeh, Perdana Ngoten</a></h5>
					</div>
					<hr>
					<small class="count-comment">
						<i class="fa fa-calendar" data-original-title="" title=""></i> 30 Juni 2014
					</small>
					<span class="pull-right">
						<a href="#" data-toggle="tooltip" data-placement="left" title="Comments">	<i class="fa fa-comments" ></i> 30</a>
						<a href="#" data-toggle="tooltip" data-placement="right" title="Loved"><i class="fa fa-heart"></i> 20</a>                  
					</span>
				</div>
				<div class="content-footer">
					<img class="user-small-img" src="https://lh3.googleusercontent.com/-uwagl9sPHag/WM7WQa00ynI/AAAAAAAADtA/hio87ZnTpakcchDXNrKc_wlkHEcpH6vMwCJoC/w140-h148-p-rw/profile-pic.jpg">
					<span style="font-size: 12px;color: #fff;">Ngo Thi Thuy Hoa</span>		                    
				</div>
			</a>
             </aside>
        </div>
        <div class="col-lg-4 col-md-4">
            <aside>
            	<a href="#" >
                <img src="https://lh3.googleusercontent.com/-ndZJOGgvYQ4/WM1ZI8dH86I/AAAAAAAADeo/l67ZqZnRUO8QXIQi38bEXuxqHfVX0TV2gCJoC/w424-h318-n-rw/thumbnail8.jpg" class="img-responsive">
                <div class="content-title">
					<div class="text-center">
						<h5><a href="#">Niki Postingan Sing Kepisan Njeh, Perdana Ngoten</a></h5>
					</div>
					<hr>
					<small class="count-comment">
						<i class="fa fa-calendar" data-original-title="" title=""></i> 30 Juni 2014
					</small>
					<span class="pull-right">
						<a href="#" data-toggle="tooltip" data-placement="left" title="Comments">	<i class="fa fa-comments" ></i> 30</a>
						<a href="#" data-toggle="tooltip" data-placement="right" title="Loved"><i class="fa fa-heart"></i> 20</a>                  
					</span>
				</div>
				<div class="content-footer">
					<img class="user-small-img" src="https://lh3.googleusercontent.com/-uwagl9sPHag/WM7WQa00ynI/AAAAAAAADtA/hio87ZnTpakcchDXNrKc_wlkHEcpH6vMwCJoC/w140-h148-p-rw/profile-pic.jpg">
					<span style="font-size: 12px;color: #fff;">Ngo Thi Thuy Hoa</span>		                    
				</div>
			</a>
             </aside>
        </div>
		</div>
	</div>
@endsection