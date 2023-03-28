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

<body style="background-image: {{ url('img/LoginBG.png') }}">
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

                            <div class="collapse navbar-collapse main-menu-item justify-content-center"
                                id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/about') }}">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/packages') }}">Kategori</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/contact') }}">Desa Wisata</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ url('login') }}" class="btn_1 d-none d-lg-block">Login</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <div class="wrapper2">
        <h2>Forgot <br>Your Password?</h2>
        <form action="{{ url('check-email') }}" method="post">
            @csrf
            <input type="email" placeholder="Email" name="email">
            <!-- <div class="terms">
                <input type="checkbox" id="checkbox">
                <label for="checkbox">I agree to these <a href="#">Terms & Condition</a></label>
            </div> -->
            <button type="submit">Request new password</button>
        </form>
    </div>

</body>

</html>
