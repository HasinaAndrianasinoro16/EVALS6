@extends('Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Course</h1>
    </div>
    <section class="dashboard section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">Liste des courses</div>
                    <table class="table table-responsive-lg table-borderless text-center">
                        <thead>
                        <th>identifiant</th>
                        <th>Nom</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{ $course->id }}</td>
                                <td>{{ $course->nom }}</td>
                                <td>
                                    <a href="/Etape/{{ $course->id }}" class="btn btn-lg btn-primary"> Participer</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
