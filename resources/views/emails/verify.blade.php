{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
</head>
<body>
    <h1>Hello {{ $name }}</h1>
    <p>Thank you for registering! Please click the link below to verify your email:</p>
    <a href="{{ url('verify-email/'.$token) }}">Verify Email</a>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Varification</title>
    <link rel="stylesheet" href="{{ asset('css/email-verification.css') }}">
</head>
<style>
  
</style>

<body style=" background-color: #d3ebf8">
    <div  style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 60vh; margin: 90px auto; padding: 30px; text-align: center; font-family: Arial, Helvetica, sans-serif; background-color: #fff;">
           <img style="width: 200px" src="https://www.referreviews.com/images/logo.png" alt="">
        <h1 class="">Hello  {{ $name }}</h1>
        
        <p>Thank you for signing up with Refer Reviews! To complete your registration and ensure the security of your account, please verify your email address by 
            clicking the button below:
        </p>
        <button style="width: 150px; height: 45px; border-radius: 10px; background-color: #0b5885; border: 1px solid #08486d; color: #fff"> <a style=" color: #fff ; text-decoration: none"  href="{{ url('verify-email/'.$token) }}">Verify Email</a></button>
       
        
    </div>
</body>
</html>

