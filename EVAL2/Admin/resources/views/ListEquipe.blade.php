@extends('Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Equipe</h1>

    </div>
    <section class="dashboard section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Listes des equipes</div>
                        <table class="table table-responsive-lg table-borderless text-center">
                            <thead>
                            <th>identifiant</th>
                            <th>Nom de l'equipe</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($equipes as $equipe)
                                    <tr>
                                        <td>{{ $equipe->id}}</td>
                                        <td>{{ $equipe->name }}</td>
                                        <td>
                                            <a href="/coureur/{{$equipe->id}}" class="btn btn-lg btn-primary"><i class="bx bxs-plus-circle"></i> Ajouter Coureur </a>
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
