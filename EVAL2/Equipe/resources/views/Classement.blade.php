@extends('Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Classememt</h1>
    </div>
    <section class="dashboard section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Voir classement General</div>
                        <div class="text-center">
                            <a href="{{ route('classementgeneral') }}" class="btn btn-lg btn-outline-dark w-25"><i class="bx bxs-paper-plane"></i> Envoyer </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Classement par etapes</div>
                        <form class="row g-3 justify-content-center" action="{{ route('listclassement') }}" method="post">
                            @csrf
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Etape</label>
                                <select id="inputState" class="form-select" name="etape" required>
                                    @foreach($etapes as $etape)
                                        <option value="{{ $etape->id }}">{{ $etape->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="py-4"></div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-dark btn-lg w-25"><i class="bx bxs-paper-plane"></i> Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Classement par Genre</div>
                        <form class="row g-3 justify-content-center" action="{{ route('ClassementGenre') }}" method="post">
                            @csrf
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Genre</label>
                                <select id="inputState" class="form-select" name="genre" required>
                                    <option value="1">Homme</option>
                                    <option value="2">Femme</option>
                                </select>
                            </div>
                            <div class="py-4"></div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-dark btn-lg w-25"><i class="bx bxs-paper-plane"></i> Envoyer</button>
                            </div>
                            {{--                            <div class="row">--}}
                            {{--                                <div class="col-lg-6 text-end"><button type="submit" class="btn btn-outline-dark btn-lg"><i class="bx bxs-paper-plane"></i> Envoyer</button></div>--}}
                            {{--                                <div class="col-lg-6"><a href="#" class="btn btn-outline-primary btn-lg" ><i class="bx bxs-folder-open"></i> Ouvrir</a></div>--}}
                            {{--                            </div>--}}
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Classement par Categorie</div>
                        <form class="row g-3 justify-content-center" action="{{ route('ClassementCategorie') }}"  method="post">
                            @csrf
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Categorie</label>
                                <select id="inputState" class="form-select" name="categorie" required>
                                    @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="py-4"></div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-dark btn-lg w-25   "><i class="bx bxs-paper-plane"></i> Envoyer</button>
                                {{--                                <a href="#" class="btn btn-outline-primary btn-lg w-25" ><i class="bx bxs-folder-open"></i> Ouvrir</a>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
