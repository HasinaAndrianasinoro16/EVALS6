@extends('Dashboard')
@section('content')
    <section class="dashboard section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Detail points</div>
                        <table class="table text-center table-borderless" >
                            <thead>
                                <th>Etape</th>
                                <th>Points</th>
                            </thead>
                            <tbody>
                                @foreach($details as $detail)
                                    <tr>
                                        <td>{{ $detail->etape_nom }}</td>
                                        <td>{{ $detail->points }} pts</td>
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
