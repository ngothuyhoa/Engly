@extends('page_user.layout.index')
@section('content')
<div class="col-lg-12 content-user">
	<h3>List Post</h3>
    <hr>
    <div class="content-user-list">
        <div class="media">
            <div class="media-left media-post">
              <img src="assets/img/footer-thumb/1.jpg" class="media-object" style="width:60px">
            </div>
            <div class="media-body">
                <h6 class="media-heading">Left-aligned Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</h6>
                <a href="">
                    <small>
                    <i class="fa fa-user" data-original-title="" title=""></i>
                        @ngothuyhoa
                    </small>
                </a>
                <p>
                    <small>
                        <i class="fa fa-calendar" data-original-title="" title=""></i>
                        30 Juni 2014
                    </small>
                    <small>
                        <i class="fa fa-eye" data-original-title="" title="" style="padding-left: 20px"></i>
                        100
                    </small>
                    <small>
                        <i class="fa fa-comment" data-original-title="" title="" style="padding-left: 20px"></i>
                        10
                    </small>
                </p>
            </div>
        </div>
    <hr>
    </div>    
</div>
@endsection