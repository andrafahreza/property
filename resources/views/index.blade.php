<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Jasa Desain Rumah" />

    <title>Jasa Desain Rumah</title>

    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="{{ asset('front') }}/assets/img/fav.html" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front') }}/assets/img/fav.png" />

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/font-awesome-pro.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/animate.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/meanmenu.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/owl-carousel.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/swiper-bundle.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/datetimepicker.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/flaticon-beauly.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/odometer.min.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/nice-select.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/main.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/price/price.css" />
</head>

<body>
    <!-- preloader -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_four"></div>
                <div class="object-1" id="object_three"></div>
                <div class="object-2" id="object_two"></div>
                <div class="object-3" id="object_one"></div>
            </div>
        </div>
    </div>
    <!-- end: Preloader -->

    <!-- /.mobile-side-menu -->
    <div class="mobile-side-menu-overlay"></div>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center justify-content-center"
        data-background="{{ asset('front') }}/assets/img/bg-img/hero-bg.jpg">
        <div class="hero-bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-content text-center">
                        <h1 class="hero-title">Jasa Desain Bangunan Profesional</h1>
                        <a href="https://wa.me/{{ $user->phone }}" class="tj-primary-btn" target="_blank">Konsultasi Gratis <i
                                class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ Hero Section -->

    <!-- About-section -->
    <section class="about-section padding bg-dark-deep">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="plan-thumb w-img">
                        <img src="{{ asset('front') }}/assets/img/images/plan-img.png" alt="plan" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <h4 class="about-sub-title d-flex align-items-center">
                            <i class="flaticon-home"></i>Pengalaman
                        </h4>
                        <h2 class="about-title">Berpengalaman lebih dari 2 abad</h2>
                        <p>
                            Dengan pengalaman yang kami miliki, fix sih kami itu mampu membantu mewujudkan property
                            impian kalian semua
                        </p>
                        <a href="#project" class="tj-primary-btn">Lihat Project <i
                                class="fa-light fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ about-section -->

    <!-- Counter Section -->
    <section class="counter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="counter-item text-center">
                        <h3 class="counter-title"><span class="odometer" data-count="{{ $user->clients }}">{{ $user->clients }}</span></h3>
                        <div class="counter-content">
                            <h4 class="counter-text">CLIENTS</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="counter-item text-center">
                        <h3 class="counter-title"><span class="odometer" data-count="{{ $user->projects }}">{{ $user->projects }}</span></h3>
                        <div class="counter-content">
                            <h4 class="counter-text">PROJECT</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ counter-section -->

    <!-- plan-section -->
    <section class="plan-section padding bg-dark-deep">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center mb-60">
                        <h2 class="section-title">Kemampuan</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="plan-content">
                        <ul>
                            @foreach ($ability as $item)
                                <li>
                                    <h3>{{ $item->ability }}</h3>
                                    <h3>{{ $item->percentage }}%</h3>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./plan-section -->

    <!-- Follow-Section -->
    <section class="follow-section bg-dark-light padding" id="project">
        <div class="follow-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center mb-60">
                        <h2 class="section-title">Project</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="follow-item-wrap">
                        @foreach ($projects as $item)
                            <div class="follow-item">
                                <div class="follow-thumb">
                                    <img src="{{ asset($item->photo) }}" alt="img" />
                                </div>
                                <div class="follow-icon"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ Follow-Section -->

    <!-- Gallery Section -->
    <section class="gallery-section bg-dark-deep padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2 class="section-title">Testimoni</h2>
                    </div>
                    <div class="beauly-gallery-wrap">
                        <div class="property-gallery owl-carousel">
                            @foreach ($testimoni as $item)
                                <div class="item photos">
                                    <img src="{{ asset($item->photo) }}" alt="gallery" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ Gallery-section -->

    <!-- pricing table  -->
    <section class="gallery-section bg-dark-light padding">
        <div class="col-lg-12">
            <div class="section-heading text-center">
                <h2 class="section-title">Daftar Paket</h2>
            </div>
        </div>
        <div class="pricing1">
            <div class="container">
                <!-- Row  -->
                <div class="row">
                    <!-- Column -->
                    @foreach ($package as $paket)
                        <div class="col-lg-4 col-md-6">
                            <div class="card text-center card-shadow on-hover border-0 mb-4">
                                <div class="card-body font-14">
                                    @if ($paket->best)
                                        <span
                                        class="badge badge-inverse p-2 position-absolute price-badge font-weight-normal">Best
                                        Seller</span>
                                    @endif
                                    <h5 class="mt-3 mb-1">{{ $paket->title }}</h5>
                                    <div class="pricing my-3">
                                        <span class="monthly display-5">Rp. {{ number_format($paket->price) }}</span>
                                        <span class="monthly display-5">/m<sup>2</sup></span>
                                    </div>
                                    <ul class="list-inline">
                                        @foreach ($paket->sub as $sub)
                                            <li class="d-block py-1">{{ $sub->sub }}</li>

                                        @endforeach
                                    </ul>
                                    <div class="bottom-btn">
                                        <a class="btn btn-success-gradiant btn-md text-white btn-block"
                                            href="#consult"><span>Konsultasi</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- end priceing table -->

    <!-- Request Section -->
    <section class="request-section bg-dark-deep padding" id="consult">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert d-none" role="alert" id="pesanResponse">
                        Terjadi Kesalahan
                    </div>
                    <div class="section-heading text-center mb-60">
                        <h2 class="section-title">Kontak Kami</h2>
                        <p>
                            Lengkapi data dibawah ini untuk memudahkan kominikasi dengan CS & Arsitek Kami
                        </p>
                    </div>
                    <div class="beauly-contact-form">
                        <form action="{{ route('send-message') }}" method="post" id="send_message" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <input type="text" id="firstname" name="name" class="form-control"
                                        placeholder="Nama Lengkap*" required="" />
                                </div>
                                <div class="form-group col-12">
                                    <input type="text" id="phone" name="whatsapp" class="form-control"
                                        placeholder="No. Whatsapp*" required="" />
                                </div>
                                <div class="form-group col-12">
                                    <input type="text" name="needed" class="form-control"
                                        placeholder="Jenis Kebutuhan*" required="" />
                                </div>
                                <div class="form-group col-12">
                                    <input type="text" name="model" class="form-control" placeholder="Model*"
                                        required="" />
                                </div>
                                <div class="form-group col-12">
                                    <input type="number" name="floor" class="form-control"
                                        placeholder="Jumlah Lantai*" required="" />
                                </div>
                                <div class="form-group col-12">
                                    <textarea id="message" name="message" cols="30" rows="5" class="form-control address"
                                        placeholder="Message" required=""></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="action" value="mailchimpsubscribe" />
                            <div class="form-item">
                                <button class="tj-primary-btn submit">
                                    Kirim
                                    <span style="top: -15.0312px; left: 27px"></span>
                                </button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ Request section -->

    <!-- Footer area -->
    <footer class="footer-area bg-dark-deep"
        data-background="{{ asset('front') }}/assets/img/bg-img/bg-footer-1.png">
        <div class="footer-top pb-0">
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer-content d-flex align-items-center justify-content-between">
                                <div class="footer-left">
                                    <div class="beauly-widget">
                                        <ul class="widget-contact-list">
                                            <li>
                                                <i class="flaticon-pin"></i>
                                                <h4 class="footer-info-heading">
                                                    <span>{{ $user->address }}</span>
                                                </h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ./ Footer area -->

    <!-- ./ Start scrollUp -->
    <div class="beauly-scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="
                        transition: stroke-dashoffset 10ms linear 0s;
                        stroke-dasharray: 307.919px, 307.919px;
                        stroke-dashoffset: 71.1186px;
                    ">
            </path>
        </svg>
        <div class="beauly-scroll-top-icon">
            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em"
                viewBox="0 0 24 24" data-icon="mdi:arrow-up" class="iconify iconify--mdi">
                <path fill="currentColor" d="M13 20h-2V8l-5.5 5.5l-1.42-1.42L12 4.16l7.92 7.92l-1.42 1.42L13 8v12Z">
                </path>
            </svg>
        </div>
    </div>
    <!-- ./ End scrollUp -->

    <!-- JS here -->
    <script src="{{ asset('front') }}/assets/js/jquery.js"></script>
    <script src="{{ asset('front') }}/assets/js/bootstrap-bundle.js"></script>
    <script src="{{ asset('front') }}/assets/js/waypoints.js"></script>
    <script src="{{ asset('front') }}/assets/js/meanmenu.js"></script>
    <script src="{{ asset('front') }}/assets/js/swiper-bundle.js"></script>
    <script src="{{ asset('front') }}/assets/js/owl-carousel.js"></script>
    <script src="{{ asset('front') }}/assets/js/owl-carousel-filter.js"></script>
    <script src="{{ asset('front') }}/assets/js/magnific-popup.js"></script>
    <script src="{{ asset('front') }}/assets/js/parallax.js"></script>
    <script src="{{ asset('front') }}/assets/js/smooth-scroll.js"></script>
    <script src="{{ asset('front') }}/assets/js/datetimepicker.js"></script>
    <script src="{{ asset('front') }}/assets/js/nice-select.js"></script>
    <script src="{{ asset('front') }}/assets/js/odometer.min.js"></script>
    <script src="{{ asset('front') }}/assets/js/wow.js"></script>
    <script src="{{ asset('front') }}/assets/js/jquery.isotope.js"></script>
    <script src="{{ asset('front') }}/assets/js/imagesloaded-pkgd.js"></script>
    <script src="{{ asset('front') }}/assets/js/ajax-form.js"></script>
    <script src="{{ asset('front') }}/assets/js/main.js"></script>

    <script>
        $('#send_message').submit(function(e) {
            e.preventDefault();

            const url = $(this).attr("action");
            const formData = new FormData(this);

            $.ajax({
                type: "post",
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(response) {
                    var title = "";
                    var icon = "";

                    $('#pesanResponse').removeClass("d-none");

                    if (response.alert == '1') {
                        $('#send_message')[0].reset();
                        $('#pesanResponse').addClass("alert-success");
                        $('#pesanResponse').removeClass("alert-danger");
                    } else {
                        $('#pesanResponse').removeClass("alert-success");
                        $('#pesanResponse').addClass("alert-danger");
                    }

                    $('#pesanResponse').html(response.message);
                },
                error: function(response) {
                    $('#pesanResponse').removeClass("d-none");
                    $('#pesanResponse').addClass("alert-danger");
                    $('#pesanResponse').removeClass("alert-success");
                    $('#pesanResponse').html(response.message);
                }
            });
        });
    </script>
</body>

</html>
