<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin {{ Auth::user()->name }}</title>

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


    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('back/assets/js/backend-bundle.min.js') }}"></script>
</head>

<body class="sidebar-double-icon  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">

        @include('back.layouts.components.header')

        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- Wrapper End-->

    @include('back.layouts.components.footer')

    <script src="{{ asset('back/assets/js/app.js') }}"></script>
    <script src="{{ asset('back/assets/js/customizer.js') }}"></script>
</body>

</html>
