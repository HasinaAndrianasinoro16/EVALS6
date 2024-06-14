<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
{{--    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">--}}
    <link href="assets/img/apple-8touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <title>Equipe</title>
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">E-Azakazaka</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            {{--            <li class="nav-item d-block d-lg-none">--}}
            {{--                <a class="nav-link nav-icon search-bar-toggle " href="#">--}}
            {{--                    <i class="bi bi-search"></i>--}}
            {{--                </a>--}}
            {{--            </li><!-- End Search Icon-->--}}

            <li class="nav-item dropdown">
            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown">

            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->name }}</h6>
                        <span>{{ Auth::user()->email }}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

{{--                    <li>--}}
{{--                        <a class="dropdown-item d-flex align-items-center" href="{{ route('reset') }}">--}}
{{--                            <i class="bi bi-server"></i>--}}
{{--                            <span>Reset Data</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link class="dropdown-item d-flex align-items-center" :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav>

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">pages</li>
{{--        <a class="nav-link collapsed" href="/">--}}
{{--            <i class="bi bi-caret-right-fill"></i>--}}
{{--            <span>Etape</span>--}}
{{--        </a>--}}
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('course') }}">
                <i class="bi bi-caret-right-fill"></i>
                <span>Course</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('ListeCoureur') }}">
                <i class="bi bi-caret-right-fill"></i>
                <span>Coureur</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('classement') }}">
                <i class="bi bi-caret-right-fill"></i>
                <span>Classement</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Penalite') }}">
                <i class="bi bi-caret-right-fill"></i>
                <span>Penalite</span>
            </a>
        </li>

    </ul>

</aside><!-- End Sidebar-->
<main id="main" class="main">
    @yield('content')
</main>
<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
