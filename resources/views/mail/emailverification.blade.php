<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<style>
    a{
        background-color:black;
        color:white;
        border:1px solid white;
    }
</style>
</head>
<body>
    Hello {{$username}}
    <br>
    Welcome to my website
    <br>
    Please click on the link below to verify your email address.
    <br>
    <a href="http://localhost:3000/email/verify/{{$verification_token}}">Verify your email</a>
    <br>
    Kind regards,
    <br>
    Ioannis
</body>
</html>

