<!DOCTYPE html>
<html>
<head>
	<title>Refer Reviews - Admin Login</title>
	<link rel="stylesheet" type="text/css" href="{{ asset("css/login.css") }}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">

</head>
<body>
	<img class="wave" src="{{ asset('images/wave.png') }}">
	<div class="container">
		<div class="img">
			<img src="{{ asset('images/phone.png') }} ">
		</div>
		<div class="login-content">
			<form action="{{ route('admin.loginSubmit') }}" method="POST" onsubmit="return formvalid()" >
				@csrf
				
                <img src="{{ asset('images/avatar.png') }}">
				<h2 class="title">Login</h2>
			
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<!-- <h5>Email</h5> -->
           		   		<input id="email" name="email" type="text" placeholder="Email" class="input" placeholder="Email" autocomplete="off">
           		   		
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
						<input  id="password" name="password" type="password" class="input" placeholder="password">
						<img src="{{ asset("images/hideicon.png") }}"
					  onclick="show()" id="showimg">
						<!-- <span id="vaild-pass"></span> -->
				</div>
            	</div>
            	<!--<a href="forgetpassword.html">Forgot Password?</a>-->

            	<button type="submit" class="btn" value="Login">Login </button>
            </form>

        </div>
    </div>
   
	<script type="text/javascript">
		 function show() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("showimg").src =
	"{{ asset('images/showimage.png') }}";
  } else {
    x.type = "password";
    document.getElementById("showimg").src =
	"{{ asset('images/hideicon.png') }}";
  }
}
	</script>


</body>
</html>
