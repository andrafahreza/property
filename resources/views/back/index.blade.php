<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('back/assets/images/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('back/assets/css/backend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/assets/vendor/remixicon/fonts/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('back/assets/vendor/@icon/dripicons/dripicons.css') }}">

    <link rel='stylesheet' href='{{ asset('back/assets/vendor/fullcalendar/core/main.css') }}' />
    <link rel='stylesheet' href='{{ asset('back/assets/vendor/fullcalendar/daygrid/main.css') }}' />
    <link rel='stylesheet' href='{{ asset('back/assets/vendor/fullcalendar/timegrid/main.css') }}' />
    <link rel='stylesheet' href='{{ asset('back/assets/vendor/fullcalendar/list/main.css') }}' />
    <link rel="stylesheet" href="{{ asset('back/assets/vendor/mapbox/mapbox-gl.css') }}">
</head>

<body class=" ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
        <section class="login-content">
            <img src="{{ asset('back/assets/images/login/02.png') }}" class="lb-img" alt="">
            <img src="{{ asset('back/assets/images/login/03.png') }}" class="rb-img" alt="">
            <div class="container h-100">
                <div class="row align-items-center justify-content-center h-100">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-lg-0 mb-4 mt-lg-0 mt-4">
                                <img src="{{ asset('back/assets/images/login/01.png') }}" class="img-fluid w-80" alt="">
                            </div>
                            <div class="col-lg-6">
                                <h2 class="mb-2">Sign In</h2>
                                <form action="{{ route('loginlur') }}" method="POST" id="formLogin">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="floating-label form-group">
                                                <input name="username" class="floating-input form-control" type="text" required>
                                                <label>Username</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="floating-label form-group">
                                                <input name="password" class="floating-input form-control" type="password" required>
                                                <label>Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('back/assets/js/backend-bundle.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/flex-tree.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/tree.js') }}"></script>
    <script src="{{ asset('back/assets/js/table-treeview.js') }}"></script>
    <script src="{{ asset('back/assets/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src='{{ asset('back/assets/vendor/fullcalendar/core/main.js') }}'></script>
    <script src='{{ asset('back/assets/vendor/fullcalendar/daygrid/main.js') }}'></script>
    <script src='{{ asset('back/assets/vendor/fullcalendar/timegrid/main.js') }}'></script>
    <script src='{{ asset('back/assets/vendor/fullcalendar/list/main.js') }}'></script>
    <script src="{{ asset('back/assets/js/sweetalert.js') }}"></script>
    <script src="{{ asset('back/assets/js/customizer.js') }}"></script>
    <script src="{{ asset('back/assets/js/chart-custom.js') }}"></script>
    <script src="{{ asset('back/assets/js/slider.js') }}"></script>
    <script src="{{ asset('back/assets/js/app.js') }}"></script>

    @if (session()->has('alert'))
        @php
            $title = "";
            $icon = "";

            if (session('alert') == '1') {
                $title = "Berhasil";
                $icon = "Success";
            } else {
                $title = "Error !";
                $icon = "error";
            }

            $message = session('message');
        @endphp

        <script>
            Swal.fire({
                icon: "{{ $icon }}",
                title: "{{ $title }}",
                text: "{{ $message }}",
                timer: 2e3,
                timerProgressBar: !0,
                showCloseButton: !0,
                didOpen: function () {
                Swal.showLoading(),
                    (t = setInterval(function () {
                    var t = Swal.getHtmlContainer();
                    t &&
                        (t = t.querySelector("b")) &&
                        (t.textContent = Swal.getTimerLeft());
                    }, 100));
                },
                onClose: function () {
                    clearInterval(t);
                },
            }).then(function (t) {
                t.dismiss === Swal.DismissReason.timer &&
                console.log("Alert ditutup");
            });
        </script>
    @endif
</body>

</html>
