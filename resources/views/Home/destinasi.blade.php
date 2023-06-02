<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaDeWa | Desa</title>
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

    @foreach ($destinasi as $destinasi)
        <section class="detailHeadDesa section_padding">
            <div class="head_tittle">
                <h2>{{ $destinasi['nama_destinasi'] }}</h2>
                <p>{{ $destinasi['alamat_destinasi'] }}</p>
            </div>
        </section>

        <!-- ======= Blog Details Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <article class="blog-details">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($arrayGambar as $key => $image)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                    @if ($key == 0) class="active" @endif></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($arrayGambar as $key => $image)
                                <div class="carousel-item @if ($key == 0) active @endif">
                                    <img src="{{ asset('images/' . $image) }}" class="d-block w-100"
                                        alt="Image {{ $key }}">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="col-sm-12">
                                    <h3>{{ $destinasi['nama_destinasi'] }}.</h3>
                                    <p>{!! $destinasi['deskripsi_destinasi'] !!}</p>
                                    <h3>Fasilitas</h3>
                                    <ul style="color: #a2a2a2; font-size: 16px;">
                                        <li>1. Area Parkir</li>
                                        <li>2. Wahana Permainan</li>
                                        <li>3. Spot Foto</li>
                                        <li>4. Toilet Umum</li>
                                        <li>5. Mushola</li>
                                        <li>6. Gazebo dan tempat duduk</li>
                                        <li>7. Area Camping Ground</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-sm-10">
                                    <h3>Category</h3>
                                    @foreach ($kategori as $kategori)
                                        <p style="margin-top: 8px;">{{ $kategori['nama_kategori'] }}</p>
                                    @endforeach

                                    <h3>HTM</h3>
                                    <p style="font-size: 20px;">Rp {{ $destinasi['htm_destinasi'] }}</p>

                                    <a href="{{ url('pesan', $destinasi['id']) }}" class="btn_5 btn-info">Pesan
                                        Tiket</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End post content -->
                </article><!-- End blog post -->

                <div class="wahanaDestinasi align-items-center">
                    <div>
                        <h4>Wahana Destinasi</h4>
                        <div class="row">
                            @foreach ($wahana as $w)
                                <div class="col-lg-6 col-md-6">
                                    <div class="detailWahana">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div id="carouselExampleSlidesOnly" class="carousel slide post-img"
                                                    data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        @foreach (explode('|', $w['foto_wahana']) as $key => $image)
                                                            <div
                                                                class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                                <img src="{{ asset('images/' . $image) }}"
                                                                    class="d-block w-100">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4>{{ $w->nama_wahana }}</h4>
                                                <p>{!! $w->deskripsi_wahana !!}</p>
                                                <h4>HTM</h4>
                                                @if ($w->htm_wahana == 0)
                                                    <p>Gratis</p>
                                                @else
                                                    <p>Rp {!! $w->htm_wahana !!}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $wahana->links() }}
                        </div>
                    </div>
                </div>
                <!-- End post author -->

                <div class="lokasiDestinasi align-items-center">
                    <div>
                        <h4>Lokasi {{ $destinasi['nama_destinasi'] }}</h4>
                        <div class="col-12">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3953.5143966788296!2d111.6825873!3d-7.7351317!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79afe6906b5b9b%3A0x596fc20d052be1ff!2sHutan%20Pinus%20NONGKO%20IJO!5e0!3m2!1sid!2sid!4v1669870003018!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div><!-- End post author -->
            </div>
        </section><!-- End Blog Details Section -->
    @endforeach

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
