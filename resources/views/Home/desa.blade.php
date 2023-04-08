<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pesona Desa</title>
    <link href="{{ url('assets/img/Logo.png') }}" rel="icon" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}" />

    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/animate.css') }}" />

    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css') }}" />

    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/themify-icons.css') }}" />

    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/flaticon.css') }}" />

    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ url('assets/fontawesome/css/all.min.css') }}" />

    <!-- magnific CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/gijgo.min.css') }}" />

    <!-- nice select CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/nice-select.css') }}" />

    <!-- slick CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/slick.css') }}" />

    <!-- style CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <header class="main_menu">
        <div class="main_menu_iner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="{{ url('assets/img/logotulis.png') }}" alt="logo" />
                            </a>
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
                                        <a class="nav-link" href="{{ url('kabupaten') }}">Kabupaten</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link is-active" href="{{ url('desa') }}">Desa Wisata</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="navbar-nav ms-auto">
                                @guest
                                    <a href="{{ url('login') }}" class="btn_1 d-none d-lg-block">Login</a>
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ url('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ url('logout') }}" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="client_review section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_tittle">
                        <h2>Desa Wisata</h2>
                        <p>Temukan berbagai Destinasi Wisata menarik yang terdapat di berbagai desa wisata.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kategori" class="kategori">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-4 col-md-6" style="margin-bottom: 20px;">
                    <a href="#">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-map-signs"></i>
                            </div>
                            <h3>Desa Wisata Kare</h3>
                            <p>
                                Provident nihil minus qui consequatur non omnis maiores. Eos
                                accusantium minus dolores iure perferendis tempore et
                                consequatur.
                            </p>
                        </div>
                    </a>
                </div>
                <!-- End Kategori 1 -->

                <div class="col-lg-4 col-md-6" style="margin-bottom: 20px;">
                    <a href="#">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-map-signs"></i>
                            </div>
                            <h3>Desa Wisata Kepel</h3>
                            <p>
                                Ut autem aut autem non a. Sint sint sit facilis nam iusto
                                sint. Libero corrupti neque eum hic non ut nesciunt dolorem.
                            </p>
                        </div>
                    </a>
                </div>
                <!-- End Kategori 2 -->

                <div class="col-lg-4 col-md-6" style="margin-bottom: 20px;">
                    <a href="#">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-map-signs"></i>
                            </div>
                            <h3>Desa Wisata Brumbun</h3>
                            <p>
                                Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.
                                Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.
                            </p>
                        </div>
                    </a>
                </div>
                <!-- End Kategori 3 -->

                <div class="col-lg-4 col-md-6" style="margin-bottom: 20px;">
                    <a href="#">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-map-signs"></i>
                            </div>
                            <h3>Desa Wisata Bodag</h3>
                            <p>
                                Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.
                                Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.
                            </p>
                        </div>
                    </a>
                </div>
                <!-- End Kategori 4 -->

                <div class="col-lg-4 col-md-6" style="margin-bottom: 20px;">
                    <a href="#">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-map-signs"></i>
                            </div>
                            <h3>Desa Wisata Curug Madu Resmi</h3>
                            <p>
                                Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.
                                Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.
                            </p>
                        </div>
                    </a>
                </div>
                <!-- End Kategori 5 -->

                <div class="col-lg-4 col-md-6" style="margin-bottom: 20px;">
                    <a href="#">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-map-signs"></i>
                            </div>
                            <h3>Desa Wisata Kayupuring</h3>
                            <p>
                                Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.
                                Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.
                            </p>
                        </div>
                    </a>
                </div>
                <!-- End Kategori 6 -->

                <div class="col-lg-4 col-md-6" style="margin-bottom: 20px;">
                    <a href="#">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-map-signs"></i>
                            </div>
                            <h3>Desa Wisata Lolong</h3>
                            <p>
                                Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.
                                Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.
                            </p>
                        </div>
                    </a>
                </div>
                <!-- End Kategori 7 -->

                <div class="col-lg-4 col-md-6" style="margin-bottom: 20px;">
                    <a href="#">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-map-signs"></i>
                            </div>
                            <h3>Desa Wisata Pakumbulan</h3>
                            <p>
                                Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.
                                Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.
                            </p>
                        </div>
                    </a>
                </div>
                <!-- End Kategori 8 -->

                <div class="col-lg-4 col-md-6" style="margin-bottom: 20px;">
                    <a href="#">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-map-signs"></i>
                            </div>
                            <h3>Desa Wisata Agro Wates</h3>
                            <p>
                                Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.
                                Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.
                            </p>
                        </div>
                    </a>
                </div>
                <!-- End Kategori 9 -->

                <div class="col-lg-4 col-md-6" style="margin-bottom: 20px;">
                    <a href="#">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-map-signs"></i>
                            </div>
                            <h3>Desa Wisata Bejalen</h3>
                            <p>
                                Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.
                                Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.
                            </p>
                        </div>
                    </a>
                </div>
                <!-- End Kategori 10 -->
            </div>
        </div>
    </section>


    <!-- jquery plugins here-->
    <script src="{{ url('assets/js/jquery-1.12.1.min.js') }}"></script>

    <!-- popper js -->
    <script src="{{ url('assets/js/popper.min.js') }}"></script>

    <!-- bootstrap js -->
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>

    <!-- magnific js -->
    <script src="{{ url('assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- swiper js -->
    <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>

    <!-- masonry js -->
    <script src="{{ url('assets/js/masonry.pkgd.js') }}"></script>

    <!-- masonry js -->
    <script src="{{ url('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ url('assets/js/gijgo.min.js') }}"></script>

    <!-- contact js -->
    <script src="{{ url('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.form.js') }}"></script>
    <script src="{{ url('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('assets/js/mail-script.js') }}"></script>
    <script src="{{ url('assets/js/contact.js') }}"></script>

    <!-- custom js -->
    <script src="{{ url('assets/js/custom.js') }}"></script>

</body>

</html>
