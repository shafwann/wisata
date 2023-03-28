<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SeDeWa</title>
    <link rel="icon" href="{{ url('img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ url('css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ url('css/themify-icons.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ url('css/flaticon.css') }}">
    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="{{ url('fontawesome/css/all.min.css') }}">
    <!-- magnific CSS -->
    <link rel="stylesheet" href="{{ url('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('css/gijgo.min.css') }}">
    <!-- niceselect CSS -->
    <link rel="stylesheet" href="{{ url('css/nice-select.css') }}">
    <!-- slick CSS -->
    <link rel="stylesheet" href="{{ url('css/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/style2.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu">
        <div class="main_menu_iner">
            <div class="container">
                <div class="row align-items-center ">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                            <a class="navbar-brand" href="{{ url('/') }}"> <img src="{{ url('img/logo.png') }}"
                                    alt="logo"> </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <div class="wrapper">
        <h2>Register to <br>Pesona Desa</h2>
        <form action="{{ url('proses-register') }}" method="post">
            @csrf
            <input type="text" placeholder="Name" name="name">
            <input type="email" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="password">
            <input type="password" placeholder="Retype Password" name="password_confirmation">
            <input type="text" placeholder="Phone Number" name="phone">
            <button type="submit">Sign Up</button>
        </form>
        <div class="member">
            <br>
            Already a member? <a href="{{ url('login') }}">Login Here</a>
        </div>
    </div>
</body>

</html>
