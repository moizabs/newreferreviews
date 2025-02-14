<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/email-verification.css') }}">
</head>
<style>
    .container-m {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        width: 60vh;
        margin: 90px auto;
        padding: 30px;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        background-color: #fff;
    }
    .container-m h1 {
        color: #08486d
    }
    .container-m p a{
        color: rgb(34, 177, 34)
    }
    .container-m p a:hover {
    color: rgb(25, 148, 25) !important;
}
    .resend-btn {
        width: 100px;
        height: 40px;
        border-radius: 10px;
        background-color: #0b5885;
        border: 1px solid #08486d;
        color: #fff
    }
    .resend-btn:hover {
        width: 100px;
        height: 40px;
        border-radius: 10px;
        background-color: #137ab6 !important;
        border: 1px solid #08486d;
        color: #fff
    }

    @media only screen and (max-width: 612px) {
        .container-m{
            width: 80%;
        }
  
}
</style>

<body style=" background-color: #d3ebf8">
    <div class="container-m">

            <img style="width: 200px" src="{{ asset('images/logo.png') }}" alt="">

        <h1 class="">Please Verify Your Email</h1>
        <p>You're almost there! we sent an email to <span style="font-weight: 600">abstest@gmail.com</span></p>
        
        <p>Just Click on the link in the email to complete your signup. if you dont see it, you may need to <span
                style="font-weight: 600">check your spam </span> folder</p>
        <p>Still can't find the email?</p>
        <button class="resend-btn" style=" ">
            Resend Email
        </button>
        <p>Need help? <a href="{{ url('/contect-us') }}">Contact Us</a></p>

    </div>
</body>

</html>
