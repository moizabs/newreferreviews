<!DOCTYPE html>
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
</html>