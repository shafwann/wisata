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

    <!-- ======= Blog Details Section ======= -->
    @foreach ($destinasi as $destinasi)
        <section id="pesanTiket" class="blog pesanTiket">
            <div class="container" data-aos="fade-up">
                <div class="inputTiket">
                    <h4>Pemesanan Tiket</h4>
                    <form action="{{ url('proses-pesan/' . $destinasi['id'] . '/' . Auth::user()->id) }}"
                        method="POST" class="row g-3">
                        @csrf
                        <div class="col-12">
                            <label for="inputDestinasi" class="form-label">Nama Destinasi</label>
                            <input type="text" class="form-control" id="inputDestinasi"
                                placeholder="{{ $destinasi['nama_destinasi'] }}" readonly />
                        </div>
                        <div class="col-12">
                            <label for="inputNamaPemesan" class="form-label">Nama Pemesan</label>
                            <input type="text" class="form-control" id="inputNamaPemesan"
                                placeholder="{{ Auth::user()->name }}" readonly />
                        </div>
                        <div class="col-12">
                            <label for="inputEmailPemesan" class="form-label">Email Pemesan</label>
                            <input type="text" class="form-control" id="inputEmailPemesan"
                                placeholder="{{ Auth::user()->email }}" readonly />
                        </div>
                        <div class="col-12">
                            <label for="tanggal" class="form-label">Tanggal Pemesanan</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" />
                        </div>
                        <div class="col-md-6">
                            <label for="jumlah" class="form-label">Jumlah Tiket</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" />
                        </div>
                        <div class="col-md-6">
                            <label for="harga" class="form-label">Harga Tiket</label>
                            <input type="text" class="form-control" id="harga" name="harga"
                                value="{{ $destinasi['htm_destinasi'] }}" readonly />
                        </div>
                        <div class="col-12">
                            <label for="total" class="form-label">Total</label>
                            <span class="form-control" id="total"></span>
                        </div>
                        <button type="submit" id="buttonLogin">Pesan</button>
                    </form>
                </div>
            </div>
        </section>
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

    <script>
        // Ambil input field harga dan jumlah
        var harga = $('#harga');
        var jumlah = $('#jumlah');

        // Tambahkan event listener untuk input field
        harga.on('input', updateTotal);
        jumlah.on('input', updateTotal);

        // Fungsi untuk mengupdate total pembayaran
        function updateTotal() {
            var h = harga.val();
            var j = jumlah.val();
            var total = h * j;
            $('#total').text(total);
        }
    </script>
</body>

</html>
