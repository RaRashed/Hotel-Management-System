@extends('partials.layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">department
                <a href="{{ route('department.index') }}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{ $department->title }}</td>
                    </tr>
                    <tr>
                        <th>Detail</th>
                        <td>{{ $department->detail}}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>

</div>

@endsection

