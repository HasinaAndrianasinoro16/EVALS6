@extends('Dashboard')]
@section('content')
    <div class="pagetitle">
        <h1>Equipe</h1>
    </div>
    <section class="dashboard section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Formulaire d'ajout equipe </div>
                        <form class="row g-3" method="post" action="{{ route('save-equipe') }}">
                            @csrf
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Nom de l'equipe</label>
                                <input type="text" class="form-control" name="name" id="inputNanme4">
                            </div>
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">E-mail</label>
                                <input type="email" class="form-control" name="email" id="inputNanme4">
                            </div>
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">mot de passe</label>
                                <input type="password" class="form-control" name="password" id="inputNanme4">
                            </div>
                            <div class="py-3"></div>
                            <div class="row">
                                <div class="col-6 text-end">
                                    <a href="{{ route('listequipe') }}" class="btn btn-lg btn-primary"><i class="bx bxs-layer"></i> Liste equipes </a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success btn-lg"><i class="bx bxs-save"></i> Enregistrer</button>
                                </div>
                            </div>
                            <div class="py-2"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
