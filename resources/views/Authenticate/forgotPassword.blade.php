<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link href="{{ url('assets/img/Logo.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ url('assets/css/login.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="wrapper">
        <h2>Forget <br>Password</h2>
        <p id="pFroget">Enter the email address <br> and we’ll send you a link to reset password</p>
        <form action="{{ url('check-email') }}" method="POST">
            @csrf
            <input type="email" placeholder="Email" name="email">
            <button id="buttonLogin" type="submit">Submit</button>
        </form>
        <div class="member">
            <br>
            Cancel Reset Password? <a href="{{ url('login') }}">Login Here</a>
        </div>
    </div>

</body>

</html>
