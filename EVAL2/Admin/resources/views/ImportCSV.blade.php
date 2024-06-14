@extends('Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Import CSV</h1>
    </div>
    <section class="dashboard section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Importation des etapes & resultats</div>
                        <form class="row g-3 justify-content-center" action="{{ route('importresultatetape') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-9">
                                <label for="inputName5" class="form-label">Etapes:</label>
                                <input type="file" class="form-control" id="inputName5" required name="etapes">
                            </div>
                            <div class="col-md-9">
                                <label for="inputName5" class="form-label">Resultat:</label>
                                <input type="file" class="form-control" id="inputName5" required name="resultat">
                            </div>
                            <div class="py-4"></div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-dark btn-lg w-50"><i class="bx bxs-save"></i> Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Importation des points</div>
                        <form class="row g-3 justify-content-center" action="{{ route('importpoint') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-9">
                                <label for="inputName5" class="form-label">Points:</label>
                                <input type="file" class="form-control" id="inputName5" required name="points">
                            </div>
                            <div class="py-4"></div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-dark btn-lg w-50"><i class="bx bxs-save"></i> Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
