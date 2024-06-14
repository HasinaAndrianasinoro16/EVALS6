@extends('Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Etape</h1>
    </div>
    <section class="dashboard section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Details d'Etape: <span class="text-primary " style="font-size: 25px">{{ request()->segment(3) }}</span> </div>
                        <table class="table table-borderless table-responsive-lg text-center" >
                            <thead>
                                <th>Nom Coureur</th>
                                <th>Genre</th>
                                <th>chrono</th>
                                <th>penalite</th>
                                <th>temp final</th>
                                <th>rang</th>
                            </thead>
                            <tbody>
                                @foreach($details as $detail)
                                    <tr>
                                        <td>{{ $detail->coureur_nom }}</td>
                                        <td>{{ $detail->genre }}</td>
                                        <td>{{ $detail->chrono }}</td>
                                        <td>{{ $detail->penalite }}</td>
                                        <td>{{ $detail->temp_final }}</td>
                                        <td>{{ $detail->rang }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
