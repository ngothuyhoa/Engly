<header class="header-section"style="background: #0d0d29">
	<a href="{{ route('home') }}" class="site-logo"><img src="/assets/img/logo.png" alt=""></a>
	<div class="nav-switch">
		<i class="fa fa-bars"></i>
	</div>
	
	<div class="nav-warp" id="nav-warp-id">
		<!-- @if(Auth::user())
			<div class="dropdown" id="dropdown-id">
                <button class="btn dropdown-toggle" id="dropdown-toggle-id" type="button" data-toggle="dropdown">
                <i class="fa fa-user"></i> <span class="caret" style="">{{ Auth::user()->fullname }}</span></button>
                <ul class="dropdown-menu">
                  <li>
                  	<form method="post" action="{{ route('logout') }}">
                  		{{ csrf_field() }}
                  		<button id="logout">Logout</button>
                  	</form>
                  </li>
                  <li><a href="{{ route('user_detail', Auth::user()->username) }}">My Post</a></li>
                  <li><a href="#">My Profile</a></li>
                  <li><a href="{{ route('post_create') }}">Write Post</a></li>
                </ul>
            </div>
		@else
		<div class="user-panel">
			<a href="{{ url('/login') }}">Login/Register</a>
		</div>
		@endif -->
		
		<ul class="main-menu">
			<li><a href="{{ route('home') }}">Home</a></li>
			<li><a href="{{ route('post') }}">Post</a></li>
			@if(Auth::check())
			<li><a href="{{ route('post_follow') }}">Following</a></li>
			@endif
			<li><a href="./contact.html">Contact</a></li>
			@if(Auth::user())
			<li class="dropdown" style="color: #ff5050">
	            <a class="dropdown-toggle" id="userProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
	                <span class="fa fa-user"> {{ Auth::user()->fullname }}</span>
	            </a>
	            <ul class="dropdown-menu" aria-labelledby="userProfileMenu" id="userProfileMenu" style="background: pink">
	            	<li>
	                  	<form method="post" action="{{ route('logout') }}">
	                  		{{ csrf_field() }}
	                  		<button id="logout">Logout</button>
	                  	</form>
                  	</li>
	                <li><a href="{{ route('user_detail', Auth::user()->username) }}">My Post</a></li>
                  	<li><a href="{{ route('user_profile', Auth::user()->username) }}">My Profile</a></li>
                  	<li><a href="{{ route('post_create') }}">Write Post</a></li>
	            </ul>
        	</li>
        	@else
			<li>
				<a href="{{ url('/login') }}">Login/Register</a>
			</li>
			@endif
			<li class="dropdown" style="color: #ffe6cc">
	            <a class="dropdown-toggle" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
	                <span class="fa fa-bell"></span>
	            </a>
	            <ul class="dropdown-menu" aria-labelledby="notificationsMenu" id="notificationsMenu" style="background: gray; width: 300px">
	                <li class="dropdown-header">No notifications</li>
	            </ul>
        	</li>
		</ul>
		<div class="search">
			<form class="form-inline active-cyan-3 active-cyan-4" method="get" action="{{ route('search') }}">
			  
			  <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search" name="search">
			  <button><i class="fa fa-search" aria-hidden="true"></i></button>
			</form>
		</div>
		
	</div>
</header>
<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <!-- This makes the current user's id available in javascript -->
    @if(!auth()->guest())
        <script>
            window.Laravel.userId = <?php echo auth()->user()->id; ?>
        </script>
    @endif