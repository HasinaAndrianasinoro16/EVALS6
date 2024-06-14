@extends('Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Coureurs:</h1>
    </div>
    <section class="dashboard section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-center">Liste des courreur de votre equipe</div>
                        <table class="table table-responsive-lg table-borderless text-center">
                            <thead>
                                <th>identifiant</th>
                                <th>Nom</th>
                                <th>Numeros de dossard</th>
                                <th>genre</th>
                                <th>date de Naissance</th>
                                <th>Categorie</th>
                            </thead>
                            <tbody>
                            @foreach($coureurs as $coureur)
                                <tr>
                                    <td>{{ $coureur->id }}</td>
                                    <td>{{ $coureur->nom }}</td>
                                    <td>{{ $coureur->numeros }}</td>
                                    <td>{{ $coureur->genre }}</td>
                                    <td>{{ $coureur->dtn }}</td>
                                    <td>{{ $coureur->categorie }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $coureurs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
