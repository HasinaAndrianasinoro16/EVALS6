@extends('Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Coureurs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('listequipe') }}">Liste equipe</a></li>
                <li class="breadcrumb-item active">coureurs</li>
            </ol>
        </nav>
    </div>
    <section class="dashboard section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-center">Formulaire ajout courreur</div>
                        <div class="py-3"></div>
                        <form class="row g-3" method="post" action="{{ route('save-coureur') }}">
                            @csrf
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Nom Complet</label>
                                <input type="text" class="form-control" name="nom" id="inputNanme4">
                                <input type="hidden" name="equipe" value="{{ request()->segment(2) }}">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Numeros de dossard</label>
                                <input type="number" min="0" name="numeros" class="form-control" id="inputPassword4">
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Genre</label>
                                <select id="inputState" class="form-select" name="genre" required>
                                    <option value="1">Homme</option>
                                    <option value="2">Femme</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">date de naissance</label>
                                <input type="date" name="dtn" class="form-control" id="inputPassword4">
                            </div>
                            <div class="py-2"></div>
                            <div class="text-center">
                                 <button type="submit" class="btn btn-success btn-lg w-50"><i class="bx bxs-plus-circle"></i> Ajouter</button>
                            </div>
                            <div class="py-2"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Liste des coureur</div>
                        <table class="table table-responsive-lg text-center table-borderless">
                            <thead>
                                <th>identifiant</th>
                                <th>Nom</th>
                                <th>numeros</th>
                                <th>genre</th>
                                <th>Date de Naissance</th>
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
                            {{ $coureurs->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
