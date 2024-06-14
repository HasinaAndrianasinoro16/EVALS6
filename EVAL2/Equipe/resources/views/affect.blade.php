@extends('Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Affectation:</h1>
{{--                <nav>--}}
{{--                    <ol class="breadcrumb">--}}
{{--                        <li class="breadcrumb-item"><a href="/">Etape </a></li>--}}
{{--                        <li class="breadcrumb-item active">formulaire affectation</li>--}}
{{--                    </ol>--}}
{{--                </nav>--}}
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Veuillez choisir vos coureurs</h5>
                        <div class="py-3"></div>
                        <div class="py-2"></div>
{{--                        <div class="text-center h5">Montant restant à payer : {{ number_format($reste, 2, '.', ' ') }} Ar</div>--}}
                        <div class="py-3"></div>
                        <!-- Message d'erreur -->
                        <div id="error-message" class="text-center text-danger" style="display: none;"></div>
                        <!-- Multi Columns Form -->
                        <form id="paiement-form" class="row g-3 justify-content-center" action="{{ route('save-etapecoureur') }}" method="post">
                            @csrf
                            <div class="col-md-9">
                                <input type="hidden" value="{{ request()->segment(3) }}" name="etape">
                                <label for="sprint" class="form-label">Coureur</label>
                                <select id="sprint" class="form-select" name="coureur" required>
                                    @foreach($coureurs as $coureur)
                                        <option value="{{ $coureur->id }}">{{ $coureur->nom }}</option>
                                    @endforeach
                                </select>
{{--                                <input class="form-control" type="text" name="montant" id="montantPaiement">--}}
{{--                                <input class="form-control" type="hidden" name="devis" id="montantDevis" value="{{ request()->segment(2) }}">--}}
                            </div>
                            <div class="py-4"></div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-lg w-50"><i class="bx bxs-save"></i> Enregistrer</button>
                            </div>
                        </form><!-- End Multi Columns Form -->
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Liste coureur </div>
                        <table class="table table-responsive-lg table-borderless text-center">
                            <thead>
                                <th>nom</th>
                                <th>numeros</th>
                                <th>depart</th>
                                <th>arriver</th>
                            </thead>
                            <tbody>
                                @foreach($chronos as $chrono)
                                    <tr>
                                        <td>{{ $chrono->nom }}</td>
                                        <td>{{ $chrono->numeros }}</td>
                                        <td>{{ $chrono->depart }}</td>
                                        <td>{{ $chrono->arriver }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function checkTotalPayment() {
                var coureurequipe = {{ $count }};
                var coureurautoriser = {{ request()->segment(2) }};
                if (isNaN(coureurequipe)) {
                    coureurequipe = 0;
                }
                if (coureurequipe == coureurautoriser) {
                    document.getElementById('error-message').textContent = 'Le nombre autorisé de coureurs sur cette étape est complet.';
                    document.getElementById('error-message').style.display = 'block';
                    return false;
                } else {
                    document.getElementById('error-message').style.display = 'none';
                    return true;
                }
            }

            document.getElementById('paiement-form').addEventListener('submit', function(event) {
                if (!checkTotalPayment()) {
                    event.preventDefault();
                }
            });
        });
    </script>
{{--    <script>--}}
{{--        document.addEventListener('DOMContentLoaded', function() {--}}
{{--            function checkTotalPayment() {--}}
{{--                var coureurequipe = {{ $count }};--}}
{{--                var coureurautoriser = {{ request()->segment(2) }};--}}
{{--                if (isNaN(coureurequipe)) {--}}
{{--                    montantPaiement = 0;--}}
{{--                }--}}
{{--                if (coureurequipe >= coureurautoriser) {--}}
{{--                    document.getElementById('error-message').textContent = 'Le nombre autoriser de coureur sur cette etape est complet.';--}}
{{--                    document.getElementById('error-message').style.display = 'block';--}}
{{--                    return false;--}}
{{--                } else {--}}
{{--                    document.getElementById('error-message').style.display = 'none';--}}
{{--                    return true;--}}
{{--                }--}}
{{--            }--}}
{{--            document.getElementById('paiement-form').addEventListener('submit', function(event) {--}}
{{--                if (!checkTotalPayment()) {--}}
{{--                    event.preventDefault();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

@endsection
