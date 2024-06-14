@extends('Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>classement</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('classement') }}">Classement formulaire</a></li>
                <li class="breadcrumb-item">Liste</li>
            </ol>
        </nav>
    </div>
    <section class="dashboard section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Liste classment:</div>
                        <table class="table-responsive-lg table table-borderless text-center">
                            <thead>
                                <th>Rang</th>
                                <th>Equipe</th>
                                <th>Points</th>
                            <th>Export(pdf)</th>
                            </thead>
                            <tbody>
                            @php
                                $scores = [];
                            @endphp

                            @foreach($classes as $classe)
                                @php
                                    $is_exaequo = in_array($classe->score, $scores);
                                    $scores[] = $classe->score;
                                @endphp
                                <tr>
                                    <td>{{ $classe->rang }}</td>
                                    <td><a href="/DetailPoint/{{ $classe->equipe_nom }}">{{ $classe->equipe_nom }}</a></td>
                                    <td>{{ $classe->score }} pts</td>
                                    @if($classe->rang == 1)
                                        <td><a href="/PDF/{{ $classe->equipe_nom }}/{{ $classe->score }}" class="btn btn-primary"><i class="bx bxs-file-pdf"></i></a></td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if($is_exaequo)
                                        <td>mitovy</td>
                                    @endif
                                </tr>
                            @endforeach



                            {{--                            @php--}}
{{--                                $previous_score = null;--}}
{{--                            @endphp--}}

{{--                            @foreach($classes as $classe)--}}
{{--                                @php--}}
{{--                                    $is_exaequo = $previous_score !== null && $classe->score == $previous_score;--}}
{{--                                    $previous_score = $classe->score;--}}
{{--                                @endphp--}}
{{--                                <tr @if($is_exaequo) class="text-success" @endif >--}}
{{--                                    <td>{{ $classe->rang }}</td>--}}
{{--                                    <td>{{ $classe->equipe_nom }}</td>--}}
{{--                                    <td>{{ $classe->score }} pts</td>--}}
{{--                                    @if($classe->rang == 1)--}}
{{--                                        <td><a href="/PDF/{{ $classe->equipe_nom }}/{{ $classe->score }}" class="btn btn-primary"><i class="bx bxs-file-pdf"></i></a></td>--}}
{{--                                    @else--}}
{{--                                        <td></td>--}}
{{--                                    @endif--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}

{{--                            @foreach($classes as  $classe)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $classe->rang }}</td>--}}
{{--                                        <td>{{ $classe->equipe_nom }}</td>--}}
{{--                                        <td>{{ $classe->score }} pts</td>--}}
{{--                                        @if( $classe->rang == 1 )--}}
{{--                                            <td><a href="/PDF/{{ $classe->equipe_nom }}/{{ $classe->score }}" class="btn btn-primary"><i class="bx bxs-file-pdf"></i> </a> </td>--}}
{{--                                        @else--}}
{{--                                            <td></td>--}}
{{--                                        @endif--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Diagrame Camembert</h5>

                        <!-- Pie Chart -->
                        <canvas id="pieChart" style="max-height: 400px;"></canvas>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#pieChart'), {
                                    type: 'pie',
                                    data: {
                                        labels: [
                                             @foreach($classes as $class)
                                            '{{ $class->equipe_nom }}',
                                             @endforeach
                                        ],
                                        datasets: [{
                                            label: 'Score Equipe ',
                                            data: [
                                                @foreach($classes as $class)
                                                    {{ $class->score }},
                                                @endforeach
                                            ],
                                            backgroundColor: [
                                                @foreach($classes as $class)
                                                    'rgb({{random_int(1,255)}}, {{random_int(1,255)}}, {{random_int(1,255)}})',
                                                @endforeach
                                                // 'rgb(255, 99, 132)',
                                                // 'rgb(54, 162, 235)',
                                                // 'rgb(255, 205, 86)'
                                            ],
                                            hoverOffset: 4
                                        }]
                                    }
                                });
                            });
                        </script>
                        <!-- End Pie CHart -->

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
