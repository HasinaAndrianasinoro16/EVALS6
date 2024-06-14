@extends('Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Penalite</h1>
    </div>
    <section class="dashboard section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Formulaire Ajouter Penalite</div>
                        <form class="row g-3" method="post" action="{{ route('savepenalite') }}">
                            @csrf
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Etape</label>
                                <select id="inputState" class="form-select" name="etape" required>
                                    @foreach($etapes as $etape)
                                        <option value="{{ $etape->id }}">{{ $etape->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Equipe</label>
                                <select id="inputState" class="form-select" name="equipe" required>
                                    @foreach($equipes as $equipe)
                                        <option value="{{ $equipe->id }}">{{ $equipe->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="penalite" class="form-label">Temp de penalite</label>
                                <input type="time" step="1" name="penalite" class="form-control" id="penalite">
                            </div>
                            <div class="py-2"></div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark btn-lg w-50"><i class="bx bxs-plus-circle"></i> Ajouter</button>
                            </div>
                            <div class="py-2"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Liste des Penalites</div>
                        <table class="table table-borderless table-responsive-lg text-center">
                            <thead>
                                <th>Etape</th>
                                <th>Equipe</th>
                                <th>temp de penalite</th>
                            </thead>
                            <tbody>
                                @foreach($penalites as $penalite)
                                    <tr>
                                        <td>{{ $penalite->etape }}</td>
                                        <td>{{ $penalite->equipe }}</td>
                                        <td>{{ $penalite->penalite }}</td>
                                        <td>
                                            <a href="/deletePenalite/{{ $penalite->id }}" class="btn btn-lg btn-danger"><i class="bx bx-trash-alt"></i> </a>
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
