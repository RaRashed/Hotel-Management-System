@extends('partials.layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rooms
                <a href="{{ route('rooms.index') }}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{ $room->title }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>{{ $room->roomtype->title}}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>

</div>

@endsection

