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
                                        <a class="nav-link is-active" href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('kabupaten') }}">Kabupaten</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('desa') }}">Desa Wisata</a>
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

    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10">
                    <div class="banner_text text-center"></div>
                </div>
            </div>
        </div>
    </section>

    <!--::Search Bar Start::-->
    <section class="booking_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="booking_menu">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="hotel-tab" data-toggle="tab" href="#hotel"
                                    role="tab" aria-controls="hotel" aria-selected="true">Destinasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tricket-tab" data-toggle="tab" href="#tricket"
                                    role="tab" aria-controls="tricket" aria-selected="false">Paket</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="booking_content">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="hotel" role="tabpanel"
                                aria-labelledby="hotel-tab">
                                <div class="booking_form">
                                    <form action="#">
                                        <div class="form-row">
                                            <div class="form_colum">
                                                <select class="nc_select">
                                                    <option selected>Pilih Kabupaten</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="form_colum">
                                                <select class="nc_select">
                                                    <option selected>Pilih Destinasi</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="form_colum">
                                                <input id="datepicker_1" placeholder="Tanggal" />
                                            </div>
                                            <div class="form_colum">
                                                <select class="nc_select">
                                                    <option selected>Jumlah</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="form_btn">
                                                <a href="#" class="btn_2">search</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tricket" role="tabpanel" aria-labelledby="tricket-tab">
                                <div class="booking_form">
                                    <form action="#">
                                        <div class="form-row">
                                            <div class="form_colum">
                                                <select class="nc_select">
                                                    <option selected>Choosace place</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="form_colum">
                                                <input id="datepicker_3" placeholder="Check in date" />
                                            </div>
                                            <div class="form_colum">
                                                <input id="datepicker_4" placeholder="Check in date" />
                                            </div>
                                            <div class="form_colum">
                                                <select class="nc_select">
                                                    <option selected>Persone</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="form_btn">
                                                <a href="#" class="btn_2">search</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="place" role="tabpanel" aria-labelledby="place-tab">
                                <div class="booking_form">
                                    <form action="#">
                                        <div class="form-row">
                                            <div class="form_colum">
                                                <select class="nc_select">
                                                    <option selected>Choosace place</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="form_colum">
                                                <input id="datepicker_5" placeholder="Check in date" />
                                            </div>
                                            <div class="form_colum">
                                                <input id="datepicker_6" placeholder="Check in date" />
                                            </div>
                                            <div class="form_colum">
                                                <select class="nc_select">
                                                    <option selected>Persone</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="form_btn">
                                                <a href="#" class="btn_1">search</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::Search Bar End::-->
    <br /><br />

    <!--::Kategori Start::-->
    <section id="kategori" class="kategori">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section_tittle text-center">
                        <h2>Kategori</h2>
                    </div>
                </div>
            </div>

            <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-4 col-md-6">
                    <a href="#">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-tree"></i>
                            </div>
                            <h3>Wisata Alam</h3>
                            <p>
                                Provident nihil minus qui consequatur non omnis maiores. Eos
                                accusantium minus dolores iure perferendis tempore et
                                consequatur.
                            </p>
                        </div>
                    </a>
                </div>
                <!-- End Kategori 1 -->

                <div class="col-lg-4 col-md-6">
                    <a href="#">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <h3>Wisata Buatan</h3>
                            <p>
                                Ut autem aut autem non a. Sint sint sit facilis nam iusto
                                sint. Libero corrupti neque eum hic non ut nesciunt dolorem.
                            </p>
                        </div>
                    </a>
                </div>
                <!-- End Kategori 2 -->

                <div class="col-lg-4 col-md-6">
                    <a href="#">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-sun fill"></i>
                            </div>
                            <h3>Wisata Kesenian</h3>
                            <p>
                                Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.
                                Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.
                            </p>
                        </div>
                    </a>
                </div>
                <!-- End Kategori 3 -->
            </div>
        </div>
    </section>
    <!--::Kategori End::-->

    <section class="client_review section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="section_tittle">
                        <h2>Explore Kabupaten</h2>
                        <p>Temukan Desa Wisata menarik di beberapa Kabupaten Wisata</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="client_review_slider owl-carousel">
                        <a href="#">
                            <div class="single_review_slider">
                                <div class="place_review">
                                    <img src="assets/img/kabupaten/kabMadiun.png" alt="" />
                                    <h4>Kabupaten Madiun</h4>
                                    <span>4 Desa Wisata</span>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="single_review_slider">
                                <div class="place_review">
                                    <img src="assets/img/kabupaten/kotaSemarang.png" alt="" />
                                    <h4>Kota Semarang</h4>
                                    <span>5 Desa Wisata</span>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="single_review_slider">
                                <div class="place_review">
                                    <img src="assets/img/kabupaten/kotaSurakarta.png" alt="" />
                                    <h4>Kota Surakarta</h4>
                                    <span>1 Desa Wisata</span>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="single_review_slider">
                                <div class="place_review">
                                    <img src="assets/img/kabupaten/kabPekalongan.png" alt="" />
                                    <h4>Kabupaten Pekalongan</h4>
                                    <span>4 Desa Wisata</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <a href="{{ url('kabupaten') }}" class="btn_1 text-cnter">Discover more</a>
        </div>
    </section>
    <!--::Kabupaten End::-->

    <!--::Destinasi Wisata Start::-->
    <section class="top_place section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section_tittle text-center">
                        <h2>Destinasi Wisata</h2>
                        <p>Temukan Destinasi Wisata menarik dari berbagai Desa Wisata</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <img src="assets/img/desa/pexels1.jpg" alt="" />
                        <div class="hover_Text d-flex align-items-end justify-content-between">
                            <div class="hover_text_iner">
                                <a href="#" class="place_btn">Kunjungi</a>
                                <h3>Hutan Pinus Nongko Ijo</h3>
                                <p>Kabupaten Madiun, Jawa Tengah</p>
                                <p>Destinasi Alam</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <img src="assets/img/desa/pexels4.jpg" alt="" />
                        <div class="hover_Text d-flex align-items-end justify-content-between">
                            <div class="hover_text_iner">
                                <a href="#" class="place_btn">Kunjungi</a>
                                <h3>Aswin Loka Seweru</h3>
                                <p>Kabupaten Madiun, Jawa Tengah</p>
                                <p>Destinasi Buatan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <img src="assets/img/desa/pexels2.jpg" alt="" />
                        <div class="hover_Text d-flex align-items-end justify-content-between">
                            <div class="hover_text_iner">
                                <a href="#" class="place_btn">Kunjungi</a>
                                <h3>Taman Gligi Forest Park</h3>
                                <p>Kabupaten Madiun, Jawa Tengah</p>
                                <p>Destinasi Alam</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <img src="assets/img/desa/pexels-thanhhoa-tran-1561440.jpg" alt="" />
                        <div class="hover_Text d-flex align-items-end justify-content-between">
                            <div class="hover_text_iner">
                                <a href="#" class="place_btn">Kunjungi</a>
                                <h3>Bumi Perkemahan Kandangan</h3>
                                <p>Kabupaten Madiun, Jawa Tengah</p>
                                <p>Destinasi Buatan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('desa') }}" class="btn_1 text-cnter">Discover more</a>
            </div>
        </div>
    </section>
    <!--::Destinasi Wisata End::-->

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
