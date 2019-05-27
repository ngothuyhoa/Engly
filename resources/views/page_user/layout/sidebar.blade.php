<div class="col-lg-3">
    <div class="widget-sidebar">
        <h2 class="title-widget-sidebar">AUTHOR</h2>
        @foreach($userSidebars as $userSidebar)
           	<div class="content-widget-sidebar">
            	<div class="media">
    			    <div class="media-left">
                        @foreach($userSidebar->images as $image)
    			             <img src="{{ $image->url }}" class="media-object">
                        @break
                        @endforeach
    			    </div>
    			    <div class="media-body">
    			      <h6 class="media-heading">{{ $userSidebar->fullname }}</h6>
    			      <p><a href="{{ route('user_detail', $userSidebar->username)}}">{{ $userSidebar->username }}</a></p>
    			    </div>
    			</div>
    			<div class="media">
    				<div class="media-left">
    					<div class="subscribe" style="margin-left: 10px">
                        @if (auth()->check() && auth()->user()->isFollowing($userSidebar->id))         
                        <form action="{{route('unfollow', ['id' => $userSidebar->id])}}" method="POST">
                            {{ csrf_field() }}

                            <button type="submit" id="delete-follow-{{ $userSidebar->id }}" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Unfollow
                            </button>
                        </form>
                        @else
                        <form action="{{route('follow', ['id' => $userSidebar->id])}}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" id="follow-user-{{ $userSidebar->id }}" class="btn btn-success">
                                <i class="fa fa-btn fa-user"></i>Follow
                            </button>
                        </form>
                        @endif
                    </div>
            		</div>
                	<div class="media-body">
    					<span class="stats-item text-muted" data-tippy="" data-original-title="Posts: 32">
    						<i aria-hidden="true" class="stats-item__icon fa fa-pencil"></i>
        					32
    					</span>
    					<span class="stats-item text-muted" data-tippy="" data-original-title="Followers: 337"><i aria-hidden="true" class="stats-item__icon fa fa-user-plus"></i>
        					337
    					</span>
    				</div>
    			</div>
           	</div>
            <hr>
        @endforeach
    </div>

    <div class="widget-sidebar">
        <h2 class="title-widget-sidebar"> LIST TAGS</h2>
       	<div class="content-widget-sidebar">
            @foreach($tagSidebars as $tagSidebar)
            <a id="tag" class="btn btn-outline-info" href="{{route('find_tag', $tagSidebar->slug)}}">{{ $tagSidebar->name }}</a>
            @endforeach
        	<!-- <ul>
                            <li class="recent-post">
                                 <a href="#">
                                     <h6>Excepteur sint occaecat cupi non proident laborum.
                                     </h6>
                                 </a>
                                 <p>
                                     <small>
                                         <i class="fa fa-calendar" data-original-title="" title=""></i>
                                          30 Juni 2014
                                     </small>
                                     <small>
                                         <i class="fa fa-user" data-original-title="" title="" style="padding-left: 10px"></i>
                                          @ngothuyhoa
                                     </small>
                                </p>
                            </li>
                            <hr>
            </ul> -->
       	</div>
    </div>
</div>