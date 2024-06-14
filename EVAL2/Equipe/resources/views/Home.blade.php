@extends('Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Etape course:</h1>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Liste des etapes</div>
                        <table class="table table-borderless text-center">
                            <thead>
                                <th>nom</th>
                                <th>longueur (km)</th>
                                <th>Nombre de coureur autoriser</th>
                                <th>rang</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($etapes as $etape)
                                    <tr>
                                        <td>{{ $etape->nom }}</td>
                                        <td>{{ $etape->longueur }}</td>
                                        <td>{{ $etape->nombrecoureur }}</td>
                                        <td>{{ $etape->rang }}</td>
                                        <td>
                                            <a href="/Affectation/{{ $etape->nombrecoureur }}/{{ $etape->id }}" class="btn btn-lg btn-primary"><i class="bx bxs-pencil"></i> Affectation </a>
                                        </td>
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
