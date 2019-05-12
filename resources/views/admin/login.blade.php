<link rel="stylesheet" href="/assets/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/assets/admin/css/login.css">

<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
	@if (count($errors) >0)
         <ul>
             @foreach($errors->all() as $error)
                 <li class="text-danger"> {{ $error }}</li>
             @endforeach
         </ul>
     @endif

     @if (session('status'))
         <ul>
             <li class="text-danger"> {{ session('status') }}</li>
         </ul>
     @endif
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <h3>Login Admin</h3>
    </div>
<hr>
    <!-- Login Form -->
    <form method="post" action="{{ route('post_login') }}">
    	{{ csrf_field() }}

      <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>