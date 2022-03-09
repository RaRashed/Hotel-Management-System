@extends('partials.layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $service->title }}
                <a href="{{ route('service.index') }}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{ $service->title }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $service->small_desc}}</td>
                    </tr>
                    <tr>
                        <tr>
                            <th>Detail Description</th>
                            <td>{{ $service->detail_desc}}</td>
                        </tr>
                        <th>Photo</th>
                        <td>
                            <img src="{{asset('storage/'.$service->photo)}}" width="100px" height="100px" alt="">
                        </td>
                    </tr>



                </table>
            </div>
        </div>
    </div>

</div>

@endsection

