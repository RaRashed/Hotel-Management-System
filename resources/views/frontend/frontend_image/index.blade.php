@extends('partials.layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">frontendimage
                <a href="{{ route('frontendimage.create') }}" class="float-right btn btn-success btn-sm">Add New</a>
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
                            <th>Iamge</th>


                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Image</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($frontendimages as $frontendimage )
                        <tr>
                            <td></td>
                            <td>
                                <img src="{{asset('storage/'.$frontendimage->image)}}" width="350px" height="350px" alt="">
                            </td>




                            <td>
                            <a href="{{ route('frontendimage.show',$frontendimage->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('frontendimage.edit',$frontendimage->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('are you sure?')" href="/admin/frontendimage/{{$frontendimage->id}}/delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <form method="post" action="{{route('frontendimage.destroy',$frontendimage->id)}}">
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
