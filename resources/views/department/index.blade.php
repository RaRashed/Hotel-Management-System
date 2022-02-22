@extends('partials.layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Department
                <a href="{{ route('department.create') }}" class="float-right btn btn-success btn-sm">Add New</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{ session('success') }}</p>

            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Detail</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>

                            <th>Title</th>
                            <th>Detail</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($departments as $department )
                        <tr>
                            <td></td>
                            <td>{{ $department->title }}</td>

                            <td>{{ $department->detail }}</td>
                            <td>
                            <a href="{{ route('department.show',$department->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('department.edit',$department->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('are you sure?')" href="/admin/department/{{$department->id}}/delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <form method="post" action="{{route('department.destroy',$department->id)}}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>


                        </tr>
                        @endforeach
                        <tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
@section('style')
<link href="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection
@section('script')
 <!-- Page level plugins -->
 <script src="{{ asset('asset/vendor/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

 <!-- Page level custom scripts -->
 <script src="{{ asset('asset/js/demo/datatables-demo.js') }}"></script>

@endsection
