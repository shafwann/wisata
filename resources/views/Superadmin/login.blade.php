<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pesona Desa</title>
    <link href="{{ url('assets/img/Logo.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ url('assets/css/login.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="wrapper">
        <h2>Login as <br>Admin</h2>
        <form action="{{ url('proses-login-admin') }}" method="POST">
            @csrf
            <input type="email" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="password">
            <button type="submit" id="buttonLogin">Log In</button>
        </form>
    </div>

</body>

</html>
