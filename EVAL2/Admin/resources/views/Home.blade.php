@extends('Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Course</h1>
    </div>
    <section class="dasboard section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Formulaire d'ajout d'une course</div>
                        <form class="row g-3" method="post" action="{{ route('save-course') }}">
                            @csrf
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Course</label>
                                <input type="text" class="form-control" name="course" id="inputNanme4">
                            </div>
{{--                            <div class="col-12">--}}
{{--                                <label for="inputNanme4" class="form-label">Debut evenement</label>--}}
{{--                                <input type="date" class="form-control" name="debut" id="inputNanme4">--}}
{{--                            </div>--}}
                            <div class="py-3"></div>
                            <div class="row">
                                <div class="col-6 text-end">
                                    <a href="{{ route('listecourse') }}" class="btn btn-lg btn-primary"><i class="bx bxs-layer"></i> Liste courses </a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success btn-lg w-25"><i class="bx bxs-plus-circle"></i> Ajouter</button>
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
