@extends('Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Export PDF (view)</h1>
    </div>
    <section class="dashboard section">
        <div class="row">
            <div class="col-lg-12" id="export">
                <div class="card">
                    <div class="card-title text-center h1"><h1>Certificat</h1></div>
                    <div class="py-4"></div>
                    <div class="h1 text-center bold">Felicitation Equipe {{ request()->segment(2) }}</div>
                    <div class="py-4"></div>
                    <div class="h6 text-center ">
                        Felicitation a l'equipe {{ request()->segment(2) }} pendant cette belle course elle nous a prouver que l'effort, l'entrainement, la perceverence sont les cle de la victoire,
                        ainsi je remet ce certificat attestant que cette equipe est l'equipe champione de la course.
                    </div>
                    <div class="py-3"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Rang equipe</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bx bx-list-ul"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>1</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Meilleur Coureur de l'equipe</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bx bx-user"></i>
                                        </div>
                                        <div class="ps-3">
                                            @foreach ($results as $result)
                                                    <h6>{{ $result->coureur_nom }}</h6>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Score Equipe</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bx bx-abacus"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ request()->segment(3) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-center">
                <button onclick="addPdf('export')" class="btn btn-primary btn-lg w-25"> to pdf</button>
            </div>
        </div>
    </section>
    <script>
        function addPdf(id) {
            var element = document.getElementById(id);
            element.style.padding = '20px';
            element.style.fontSize = "small";
            html2pdf(element);
        }
    </script>
@endsection
{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">--}}
{{--    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">--}}

{{--    <!-- Template Main CSS File -->--}}
{{--    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">--}}
{{--    <title>PDF</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<main id="main" class="main">--}}
{{--    <div id="export">--}}
{{--        <div class="py-4"></div>--}}
{{--        <div class="pagetitle text-center">--}}
{{--            <h1>ULTIMATE TEAM RACE</h1>--}}
{{--        </div>--}}
{{--        <section class="dashboard section">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="py-3" ></div>--}}
{{--                    <p class="h1 text-center">FELICITATION A L'EQUIPE <span class="text-success">[NOM EQUIPE]</span></p>--}}
{{--                    <div class="py-4" ></div>--}}
{{--                </div>--}}



{{--            </div>--}}
{{--        </section>--}}
{{--    </div>--}}
{{--</main>--}}
{{--</body>--}}
{{--<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>--}}
{{--<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>--}}
{{--<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>--}}

{{--<!-- Template Main JS File -->--}}
{{--<script src="{{ asset('assets/js/main.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/html2pdf.bundle.min.js') }}"></script>--}}
{{--</html>--}}
