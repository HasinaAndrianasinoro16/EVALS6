@extends('Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Course</h1>
    </div>
    <section class="dashboard section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Listes des courses disponnible</div>
                        <table class="table table-responsive-lg table-borderless text-center">
                            <thead>
                                <th>identifiant</th>
                                <th>Nom de l'evenement</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->nom }}</td>
                                    <td>
                                        <a href="/Etapes/{{ $course->id }}" class="btn btn-lg btn-primary"><i class="bx bxs-plus-circle"></i> Ajouter Etapes </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{ $courses->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
