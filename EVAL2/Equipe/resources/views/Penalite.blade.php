@extends('Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Penalite:</h1>
    </div>
    <section class="dashboard section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Liste des penalites de l'equipe</div>
                        <table class="table table-borderless table-responsive-lg text-center">
                            <thead>
                                <th>equipe</th>
                                <th>Etape</th>
                                <th>penalite</th>
                            </thead>
                            <tbody>
                                @foreach($penalites as $penalite)
                                    <tr>
                                        <td>{{ $penalite->equipe }}</td>
                                        <td>{{ $penalite->etape }}</td>
                                        <td>{{ $penalite->penalite }}</td>
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
