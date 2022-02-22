@extends('partials.layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $roomtype->title }}
                <a href="{{ route('rooms.index') }}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{ $roomtype->title }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>{{ $roomtype->price }}</td>
                    </tr>
                    <tr>
                        <th>Room Type</th>
                        <td>{{ $roomtype->detail }}</td>

                    </tr>
                    <tr>
                        <th>Gallery Image</th>



                         <td>
                            <table class="table table-bordered">
                                <tr>

                                    @foreach ($roomtype->roomtypeimages as $img )
                                    <td class="imgcol{{ $img->id }}">
                                        <img src="{{asset('storage/'.$img->image_src)}}" width="100px" height="100px" alt="">

                                    </td>

                                    @endforeach

                                </tr>

                            </table>
                        </td>

                    </tr>

                </table>
            </div>
        </div>
    </div>

</div>

@endsection

