<!DOCTYPE html>
<html>
<head>
	<title>Refer Reviews - Reset Password</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
</head>
<body>
		<img class="wave" src="{{ asset('images/wave.png') }}">
	<div class="container">
		<div class="img">
			<img src="{{ asset('images/Forgot_password1.png') }}">
		</div>
		<div class="login-content">
			<form action="{{route('company.cheak.email')}}" method="POST">
			    @csrf
				<img src="{{ asset('images/avatar.png') }}">
    		    @if (Session::has('message'))
                     <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
				<h2 class="title">Confirm Email </h2>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<!-- <h5>Email</h5> -->
           		   		<input type="Email" class="input" name="email" placeholder="Email">
           		   </div>
           		</div>
           		<!-- <div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div"> -->
           		    	<!-- <h5>Password</h5> -->
           		    	<!-- <input type="password" class="input" placeholder="Password">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a> -->
                
            	<input  type="submit" class="btn" value="Submit">
            
            </form>
        </div>
    </div>
    <script type="text/javascript" src="./js/app.js"></script>
</body>
</html>