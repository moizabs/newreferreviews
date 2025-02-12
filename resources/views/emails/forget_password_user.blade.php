<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body style="margin: 0%; font-family: sans-serif; height:100vh">
    <div class="container">
        
        <div class="inner_section" style="max-width: 1100px;
        margin: auto;
        text-align: center;">
            <div class="header"
            style="width:100%; height:auto; display: flex; justify-content: space-around;align-items: center;">
            <div class="header-logo">
                <img style="width:75px;padding: 10px;" src="https://review.daydispatch.com/images/logo.png" alt="">
            </div>
           
        </div>
            <img src="https://tlr.stripocdn.email/content/guids/CABINET_2af5bc24a97b758207855506115773ae/images/80731620309017883.png"
                alt="">
        </div>
        <div class="inner_section2" style="max-width: 600px;
        margin: auto;">
        <div style="border-bottom:1px solid #aaa;">
            <h2 style="font-weight: 600; font-size: 24px;">Forgot your password?</h2>
            <p>Hello,<br><br>We’ve received a request to reset the password for the Refer Review account associated with
               <strong style="color: #f4b459;">info@daydispatch.com .</strong> No changes have been made to your account yet.
                <br><br>You can reset your password by clicking the link below:
            </p>
        </div>
            <div style="text-align: center; margin-top: 30px;">
                <button  style="color: #fff;
            border-radius: 8px;
            padding: 10px;
            background: #f4b459;
            outline: none !important;        
            font-size: 18px;
            cursor: pointer;
            border: none;"><a style="text-decoration: none; font-size: 18px;color: #fff;" href="{{ route('user.reset.password.get', $token) }}">RESET YOUR PASSWORD</a> </button>
            </div>
            <div style="width:85%;border-bottom:4px solid #f4b459;padding:0 8px;margin: 30px;"></div>
        </div>
            <div  style="background:#f6f6f6">
                <div style="max-width: 630px;
                margin: auto; padding: 5px 0;" class="inner_section3">
            <h4 style="    color: #3f67a9;font-size: 30px;
            text-align: center;">Questions?</h4>
            <div style="display:flex;justify-content: space-between; gap: 10px;">
            <card style="width: 100%;
            background: #fff;
            padding: 10px;border-radius: 10px;text-align: center;">
        <h2 style="font-size: 30px;">Call</h2>
        <i style="font-size: 28px;color: #1da0f1;"class="fa-solid fa-phone"></i>
        <h3>(000) 123 - 456</h3>
            </card>
            <card style="width: 100%;
            background: #fff;
            padding: 10px;    border-radius: 10px;text-align: center;">
                <h2 style="font-size: 30px;">Reply</h2>
                <i style="font-size: 28px; color: #1da0f1;;" class="fa-solid fa-message"></i>
                <h3>info@daydispatch.com</h3>
                    </card>
                </div>
        </div>
       
    </div>
</div>
</body>

</html>