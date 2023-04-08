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
        <p id="pFroget">Enter your new password</p>
        <form action="{{ url('proses-reset-password', $id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="password" placeholder="Password" name="password">
            <input type="password" placeholder="Confirm Password" name="password_confirmation">
            <button id="buttonLogin" type="submit">Submit</button>
        </form>
        <div class="member">
            <br>
            Cancel Reset Password? <a href="{{ url('login') }}">Login Here</a>
        </div>
    </div>

</body>

</html>