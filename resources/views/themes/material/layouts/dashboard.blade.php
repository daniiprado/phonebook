<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>{{ config('app.name') }} @yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- Headers Start -->
    @include('themes.material.layouts.partials.header')
    <!-- Headers Ends -->

</head>
<body>
    <div class="wrapper">

        <!-- Sidebar Start -->
        @include('themes.material.layouts.partials.sidebar')
        <!-- Sidebar Ends -->

        <div class="main-panel">
            <!-- Navbar Start -->
            @include('themes.material.layouts.partials.navbar')
            <!-- Navbar Ends -->

                <div class="content">
                    <div class="container-fluid">
                        <!-- Content Start -->
                    @yield('content')
                    <!-- Content Ends -->
                    </div>
                </div>

            <!-- Footer Start -->
            @include('themes.material.layouts.partials.footer')
            <!-- Footer Ends -->
        </div>

    </div>
</body>

<!-- Scripts Starts -->
    <!--   Core JS Files   -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/material.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
    <!-- Custom Scripts Start -->
    @stack('scripts')
    <!-- TagsInput Plugin -->
    <script src="{{ asset('js/jquery.tagsinput.js') }}"></script>
    <!-- Material Dashboard javascript methods -->
    <script src="{{ asset('js/material-dashboard.js') }}" type="text/javascript"></script>
    <!-- Custom Scripts Ends -->

    <!-- Custom Functions Start -->
    @stack('functions')
    <!-- Custom Functions Ends -->
<!-- Scripts Ends -->

</html>