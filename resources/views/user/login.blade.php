<!DOCTYPE html>
<html>
<head>
	<title>Refer Reviews - User Login</title>
	<link rel="stylesheet"  href="{{ asset('css/login.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
	
    
</head>
<body>
	<img class="wave" src="{{ asset('images/wave.png') }}">
	<div class="container">
		<div class="img">
			<img src="{{ asset('images/phone.png') }}">
		</div>
		<div class="login-content">
		  	<form action="{{ route('user.login.submit') }}" method="POST" onsubmit="return formvalid()" >
                @csrf
		     
				<img src="{{ asset('images/avatar.png') }}">
				<h2 class="title">Login As User</h2>
				
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<!-- <h5>Email</h5> -->
           		   		<input id="email" type="Email"  name="email" class="input " placeholder="Email" autocomplete="off">
           		  
                     <span id="useremail"></span>
           		   </div>
           		</div>
           			@if(Session::has('fail'))
                    <div class="alert alert-danger text-left" >
                    {{Session::get('fail')}}
                    </div>
                @endif   
           		<div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
					  <div class="div">
						<!-- <h5>Email</h5> -->
						<input  id="password" type="password" name="password" class="input" placeholder="password">
						
						<img src="{{ asset('images/hideicon.png') }}"
					  onclick="show()" id="showimg">
						<!-- <span id="vaild-pass"></span> -->
				</div>
            	</div>
                <div style="display: flex;flex-direction: row-reverse;justify-content: space-between;">
                <a href="{{ route('company.login') }}" class="text-info">Login As Business</a>
                <a href="{{ route('company.forgetPassword') }}">Forgot Password?</a>
                </div>
                <input type="submit" class="btn" value="Login">
				<div class="btns-parent">
					<button class="googleORfacebook-btn">Continue with Google</button>
					<button class="googleORfacebook-btn">Continue with FaceBook</button>
				</div>
                <div class=" d-flex" style="display:flex;justify-content: flex-end;align-items: center;">
                <div class="signup-section">Not a member yet?</div>
                <div>
                <a href="{{ route('user.register') }}" class="text-info">Sign Up</a>
                </div>
                </div>
            	
                

				
            	
            </form>

        </div>
    </div>
    @include('layouts.foot')
    <script type="text/javascript">
	    function show() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
            document.getElementById("showimg").src =
        	"{{ asset('images/showimage.png') }}";
          } else {
            x.type = "password";
            document.getElementById("showimg").src ="{{ asset('images/hideicon.png') }}";
        	
          }
        }
	</script>


</body>
</html>
