@extends('partials.layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $staff->full_name }}
                <a href="{{ route('staff.index') }}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{ $staff->full_name }}</td>
                    </tr>
                    <tr>
                        <th>Department</th>
                        <td>{{ $staff->department->title}}</td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td>
                            <img src="{{asset('storage/'.$staff->photo)}}" width="100px" height="100px" alt="">
                        </td>
                    </tr>
                    <tr>
                        <th>Bio</th>
                        <td>{{ $staff->bio}}</td>
                    </tr>
                    <tr>
                        <th>Salary Type</th>
                        <td>{{ $staff->salary_type}}</td>
                    </tr>
                    <tr>
                        <th>Salary Amount</th>
                        <td>{{ $staff->salary_amt}}</td>
                    </tr>


                </table>
            </div>
        </div>
    </div>

</div>

@endsection

