<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
		<img class="wave" src="{{ asset('images/wave.png') }}">
	<div class="container">
		<div class="img">
			<img src="{{ asset('images/forgetpassword.png') }}">
		</div>
		<div class="login-content">
			<form action="email.html">
				<img src="{{ asset('images/avatar.png') }}">
				<h2 class="title">Confirm Email </h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<!-- <h5>Email</h5> -->
           		   		<input type="Email" class="input" placeholder="Email">
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