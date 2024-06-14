@extends('Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Etapes:</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('listecourse') }}">liste courses</a></li>
                <li class="breadcrumb-item active">Etapes</li>
            </ol>
        </nav>
    </div>
    <section class="dashboard section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Formulaire d'ajout d'une nouvelle Etape {{ request()->segment(2) }}</div>
                        <form class="row g-3" method="post" action="{{ route('save-etapes') }}">
                            @csrf
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" id="inputNanme4">
                                <input type="hidden" value="{{ request()->segment(2) }}" name="course">
                            </div>
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Longueur (km)</label>
                                <input type="number" min="1" class="form-control" name="longueur" id="inputNanme4">
                            </div>
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Nombre de courreur</label>
                                <input type="number" min="1" class="form-control" name="coureur" id="inputNanme4">
                            </div>
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Rang</label>
                                <input type="number" min="1" class="form-control" name="rang" id="inputNanme4">
                            </div>
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Debut</label>
                                <input type="datetime-local" min="1" class="form-control" name="debut" id="inputNanme4">
                            </div>
                            <div class="py-3"></div>
                            <div class="row">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success btn-lg w-25"><i class="bx bxs-plus-circle"></i> Ajouter</button>
                                </div>
                            </div>
                            <div class="py-2"></div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">listes des etapes de cette courses</div>
                        <table class="table table-responsive-lg table-borderless text-center">
                            <thead>
                                <th>Nom</th>
                                <th>Longueur(km)</th>
                                <th>Nombre de coureur</th>
                                <th>Rang</th>
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
                                            <a href="/DetailEtape/{{ $etape->id }}/{{ $etape->nom }}" class="btn btn-warning"><i class="ri-eye-fill" ></i> Voir Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{ $etapes->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
