<!DOCTYPE html>
<html>
<head>
	<title>Refer Reviews - Recover Password</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
	integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
	crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
		<img class="wave" src="{{ asset('images/wave.png') }}">
	<div class="container">
		<div class="img">
				<!--<img src="{{ asset('images/recoverpassword.png') }}">-->
		</div>
		<div class="login-content">
			<form action="{{ route('user.reset.password.post') }}" method="POST" onsubmit="return formvalid()">
			    @csrf
				<img src="{{ asset('images/avatar.png') }}">
				<h2 style="font-size:1.9rem" class="title">Recover Password </h2>
				 <input type="hidden" name="token" value="{{ $token }}">
				<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user" aria-hidden="true"></i>
           		   </div>
           		   <div class="div">
           		   		<!-- <h5>Email</h5> -->
           		   		<input id="email" type="Email" name="email" class="input " placeholder="Email" autocomplete="off">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        <span id="useremail"></span>
           		   </div>
           		</div>
           		<div class="input-div one">
           		   <div class="i">
                    <i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		   		<!-- <h5>Password</h5> -->
           		   		
           		   		<input  id="password" name="password" type="password" class="input" placeholder="password">
							  <img src="{{ asset('images/hideicon.png') }}"
							onclick="show2()" id="showimg">
						@if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
							  <!-- <span id="vaild-pass"></span> -->
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   
           		   <div class="div">
           		    	<!-- <h5>Confirm Password</h5> -->
           		    	 <input  id="pswd2" name="password_confirmation" type="password" class="input" placeholder="Confirm Password">
							<img src="{{ asset('images/hideicon.png') }}"
							onclick="show()" id="showimg1">
							<!-- <span id="vaild-pass"></span> -->
							@if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                  @endif
            	   </div>
            	</div>
            	<!-- <a href="#">Forgot Password?</a> -->
				<div  class="toast">
					<div  class="toast-content">
						<i class="fa-solid fa-check check"></i>
						<!-- <i  class="fa-solid fa-xmark close"></i> -->
						<!-- <div id="message" class="message">
                              
							
						</div> -->
						<div  class="message">
							<span style="color: red;" id="text" class="text"></span>
							<span id="message"></span>
							<span style="color:green" id="success"></span>
						  
					  </div>
						<i  class="fa-solid fa-xmark close"></i>
						<div  class="progress"></div>
					</div>
				</div>
				<!--<input id="button"  type="submit" class="btn" value="Submit">-->
				<button id="button" type="submit" class="btn">Submit</button>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="./js/app.js"></script>
 
<script>
    function show2() {
	var y = document.getElementById("password");
  if (y.type === "password") {
    y.type = "text";
    document.getElementById("showimg").src =
      "./webimages/showimage.png";
  } else {
    y.type = "password";
    document.getElementById("showimg").src =
      "./webimages/hideicon.png";
  }
 }

 function show() {
  var x = document.getElementById("pswd2");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("showimg1").src =
	"./webimages/showimage.png";
  } else {
    x.type = "password";
    document.getElementById("showimg1").src =
	"./webimages/hideicon.png";
  }
 }
</script>
</body>
</html>