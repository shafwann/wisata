<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaDeWa | Register </title>
    <link href="{{ url('assets/img/Logo.png') }}" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">

    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/animate.css') }}">

    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css') }}">

    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/themify-icons.css') }}">

    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/flaticon.css') }}">

    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ url('assets/fontawesome/css/all.min.css') }}">

    <!-- magnific CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/gijgo.min.css') }}">

    <!-- nice select CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/nice-select.css') }}">

    <!-- slick CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/slick.css') }}">

    <!-- style CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/login.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="wrapper">
        <div class="back">
            <a href="{{ url('/') }}"><button class="btn_back"><i class="fas fa-home"></i> Home</button></a>
        </div>
        <h2>Register to <br>Pesona Desa</h2>
        <form action="{{ url('proses-register') }}" method="POST">
            @csrf
            <input class="input" type="text" placeholder="Name" name="name">
            <input class="input" type="email" placeholder="Email" name="email">
            <input class="input" type="password" placeholder="Password" name="password">
            <input class="input" type="password" placeholder="Retype Password" name="password_confirmation">
            <input class="input" type="text" placeholder="Phone Number" name="phone">
            <button id="buttonLogin" type="submit">Sign Up</button>
        </form>
        <p><b>OR</b></p>
        <form action="{{ url('auth/google') }}">
            @csrf
            <button id="buttonGoogle"><img src="{{ url('assets/img/icongg.png') }}" alt="text">
                <span>Sign Up with Google</span>
            </button>
        </form>
        <div class="member">
            <br>
            Already a Member? <a href="{{ url('login') }}">Login Here</a>
        </div>
    </div>

</body>

</html>
