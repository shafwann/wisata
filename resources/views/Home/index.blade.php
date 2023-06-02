<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pesona Desa</title>
    <link href="{{ url('/assets/img/Logo.png') }}" rel="icon" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('/assets/css/bootstrap.min.css') }}" />

    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ url('/assets/css/animate.css') }}" />

    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ url('/assets/css/owl.carousel.min.css') }}" />

    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ url('/assets/css/themify-icons.css') }}" />

    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ url('/assets/css/flaticon.css') }}" />

    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ url('/assets/fontawesome/css/all.min.css') }}" />

    <!-- magnific CSS -->
    <link rel="stylesheet" href="{{ url('/assets/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ url('/assets/css/gijgo.min.css') }}" />

    <!-- nice select CSS -->
    <link rel="stylesheet" href="{{ url('/assets/css/nice-select.css') }}" />

    <!-- slick CSS -->
    <link rel="stylesheet" href="{{ url('/assets/css/slick.css') }}" />

    <!-- style CSS -->
    <link rel="stylesheet" href="{{ url('/assets/css/style.css') }}" />
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
                                            <a class="dropdown-item" href="{{ url('daftar-pemesanan') }}">Pesanan</a>
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

    <div id="carouselExampleIndicators" class="banner_part carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($banner as $key => $image)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                    @if ($key == 0) class="active" @endif></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($banner as $key => $image)
                <div class="carousel-item @if ($key == 0) active @endif">
                    <img src="{{ asset('images/' . $image) }}" class="d-block w-100" alt="Image {{ $key }}">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!--::Search Bar Start::-->
    <section class="booking_part">
        <div class="container">
            <div class="col-lg-12">
                <div class="booking_menu">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="hotel-tab" data-toggle="tab" href="#hotel"
                                role="tab" aria-controls="hotel" aria-selected="true">Destinasi</a>
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
                                                @foreach ($kabupaten['data'] as $kab)
                                                    <option value="{{ $kab['id'] }}">{{ $kab['nama_kabupaten'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form_colum">
                                            <select class="nc_select">
                                                <option selected>Pilih Kategori</option>
                                                @foreach ($kategori['data'] as $kat)
                                                    <option value="{{ $kat['id'] }}">{{ $kat['nama_kategori'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form_btn">
                                            <a href="#" class="btn_2">search</a>
                                        </div>
                                    </div>
                                </form>
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
                @foreach ($kategori['data'] as $kate)
                    <div class="col-lg-4 col-md-6">
                        <a href="#">
                            <div class="service-item position-relative">
                                <div class="icon">
                                    <i class="fas {{ $kate['icon'] }}"></i>
                                </div>
                                <h3>{{ $kate['nama_kategori'] }}</h3>
                                <p>
                                    Provident nihil minus qui consequatur non omnis maiores. Eos
                                    accusantium minus dolores iure perferendis tempore et
                                    consequatur.
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
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
                        @foreach ($kabupaten['data'] as $kab)
                            <a href="{{ url('kabupaten/' . $kab['id']) }}">
                                <div class="single_review_slider">
                                    <div class="place_review">
                                        <img src="{{ isset($kab['foto_kabupaten']) ? asset('images/' . $kab['foto_kabupaten']) : asset('images/kabupaten_default.jpg') }}"
                                            alt="" />
                                        <h4>{{ $kab['nama_kabupaten'] }}</h4>
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($desa['data'] as $des2)
                                            @if ($des2['regency_id'] == $kab['regency_id'])
                                                @php
                                                    $count++;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <span>{{ $count }} Desa Wisata</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="{{ url('kabupaten') }}" class="btn_1 text-cnter">Discover more</a>
        </div>
    </section>
    <!--::Kabupaten End::-->

    <!--::Desa Wisata Start::-->
    <section class="top_place section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="section_tittle text-center">
                        <h2>Desa Wisata</h2>
                        <p>Jelajahi berbagai Desa Wisata yang memiliki beranekaragam destinasi di dalamnya</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($profildesa as $des)
                    <div class="col-lg-6 col-md-6">
                        <div class="single_place">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach (explode('|', $des['foto_desa']) as $key => $image)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('images/' . $image) }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="hover_Text d-flex align-items-end justify-content-between">
                                <div class="hover_text_iner">
                                    <a href="{{ url('desa', $des['id']) }}" class="place_btn">Kunjungi</a>
                                    <h3>{{ $des['nama_desa'] }}</h3>
                                    <p>{{ $des['alamat_desa'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <a href="desa.html" class="btn_1 text-cnter">Discover more</a>
            </div>
        </div>
    </section>
    <!--::Desa Wisata End::-->

    <!--::Destinasi Wisata Start -->
    <section class="recent-posts section_padding">
        <div class="container" data-aos="fade-up">
            <div class="section_tittle text-center">
                <h2>Destinasi Wisata</h2>
                <p>Jelajahi berbgai destinasi menarik</p>
            </div>
            <div class="row gy-4">
                @foreach ($destinasi as $dest)
                    <div class="col-xl-4 col-md-6">
                        <article>
                            <div id="carouselExampleSlidesOnly" class="carousel slide post-img" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach (explode('|', $dest['foto_destinasi']) as $key => $image)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('images/' . $image) }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @foreach ($kategori1 as $kat)
                                @if ($dest['kategori_id'] == $kat->id)
                                    <p class="post-category">Wisata {{ $kat->nama_kategori }}</p>
                                @endif
                            @endforeach
                            <h2 class="title">
                                <a href="{{ url('destinasi', $dest['id']) }}">{{ $dest['nama_destinasi'] }}</a>
                            </h2>
                            <div class="d-flex align-items-center">
                                <div class="post-meta">
                                    @foreach ($regency as $reg)
                                        @if ($dest['regency_id'] == $reg->id)
                                            <p class="post-author"><i class="fas fa-location-arrow"
                                                    style="margin-right: 5px;"></i>{{ $reg->name }}</p>
                                        @endif
                                    @endforeach
                                    <p class="post-date">Rp {{ $dest['htm_destinasi'] }}</p>
                                </div>
                            </div>
                        </article>
                    </div><!-- End post list item -->
                @endforeach
            </div><!-- End recent posts list -->
        </div>
    </section>
    <!--::Destinasi Wisata End -->

    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-7">
                    <div class="single-footer-widget">
                        <h4 id="JudulFooter">Pesona Desa</h4>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                            valies
                            darta donna mare fermentum iaculis eu non diam phasellus.</p>

                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="single-footer-widget footer_icon">
                        <h4>Contact Us</h4>
                        <p>Kampus Mesen UNS, Jl. Jend. Urip Sumoharjo No.116, Purwodiningratan, Kec. Jebres, Kota
                            Surakarta, Jawa
                            Tengah 57129
                            <br>(0271) 663450
                        </p>
                        <span>kontak@d3ti.vokasi.uns.ac.id</span>
                        <div class="social-icons">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"><i class="ti-twitter-alt"></i></a>
                            <a href="#"><i class="ti-pinterest"></i></a>
                            <a href="#"><i class="ti-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <p class="footer-text m-0">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <script src="{{ url('https://245f-139-0-151-31.ngrok-free.app/assets/js/jquery-1.12.1.min.js') }}"></script>

    <!-- popper js -->
    <script src="{{ url('https://245f-139-0-151-31.ngrok-free.app/assets/js/popper.min.js') }}"></script>

    <!-- bootstrap js -->
    <script src="{{ url('https://245f-139-0-151-31.ngrok-free.app/assets/js/bootstrap.min.js') }}"></script>

    <!-- magnific js -->
    <script src="{{ url('https://245f-139-0-151-31.ngrok-free.app/assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- swiper js -->
    <script src="{{ url('https://245f-139-0-151-31.ngrok-free.app/assets/js/owl.carousel.min.js') }}"></script>

    <!-- masonry js -->
    <script src="{{ url('https://245f-139-0-151-31.ngrok-free.app/assets/js/masonry.pkgd.js') }}"></script>

    <!-- masonry js -->
    <script src="{{ url('https://245f-139-0-151-31.ngrok-free.app/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ url('https://245f-139-0-151-31.ngrok-free.app/assets/js/gijgo.min.js') }}"></script>

    <!-- contact js -->
    <script src="{{ url('https://245f-139-0-151-31.ngrok-free.app/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ url('https://245f-139-0-151-31.ngrok-free.app/assets/js/jquery.form.js') }}"></script>
    <script src="{{ url('https://245f-139-0-151-31.ngrok-free.app/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('https://245f-139-0-151-31.ngrok-free.app/assets/js/mail-script.js') }}"></script>
    <script src="{{ url('https://245f-139-0-151-31.ngrok-free.app/assets/js/contact.js') }}"></script>

    <!-- custom js -->
    <script src="{{ url('https://245f-139-0-151-31.ngrok-free.app/assets/js/custom.js') }}"></script>
</body>

</html>
