@extends('page_user.layout.index')
@section('content')
<div class="col-lg-12 content-user">
    <div class="content-widget-sidebar">
        <div class="d-flex justify-content-center"> 
        <div class="media">
            <div class="media-left">
              <img src="assets/img/footer-thumb/1.jpg" class="media-object">
            </div>
            <div class="media-body">
              <h5 class="media-heading">Ngo Thuy Hoa</h5>
              <p><a href="">hoa@gmail.com</a></p>
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