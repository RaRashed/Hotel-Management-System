@extends('partials.layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rooms
                <a href="{{ route('customer.index') }}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td>{{ $customer->full_name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $customer->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $customer->phone }}</td>

                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $customer->address }}</td>
                        </tr>
                        <tr>
                            <th>Photo</th>


                            <td>
                                <img src="{{asset('storage/'.$customer->photo)}}" width="100px" height="100px" alt="">
                            </td>
                        </tr>

                    </table>
                </div>


        </div>
    </div>

</div>

@endsection

