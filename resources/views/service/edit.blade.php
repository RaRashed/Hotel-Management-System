@extends('partials.layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Update {{ $service->title }}
                <a href="{{ route('service.index') }}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{ session('success') }}</p>

            @endif
            <form action="{{ route('service.update',$service->id)}}" method="post" enctype="multipart/form-data">

                @csrf
                @method('put')

                <div   class="from-group">
                    <label for="title">Title</label>

                    <input type="text" id="title" class="form-control" name="title" value="{{ $service->title }}">

                   </div>
                   <div   class="from-group">
                    <label for="title">Description</label>

                    <input type="text" id="title" class="form-control" name="small_desc" value="{{ $service->small_desc }}">

                   </div>
                   <div   class="from-group">
                    <label for="title">Detail Description</label>

                    <textarea name="detail_desc" id="" cols="10" rows="10" class="form-control"> {{ $service->detail_desc }}</textarea>

                   </div>
                   <div   class="from-group">
                    <label for="title">Photo</label>

                    <input type="file" class="form-control" name="photo">
                    <input type="hidden" value="{{$service->photo}}" name="prev_photo" >
                    <img src="{{ asset('storage/'.$service->photo) }}" height="100px" width="100px">

                   </div>


                   <div class="form-group">

                       <button class="btn btn-success mb-2">
                           Update service
                       </button>
                   </div>
            </form>
        </div>
    </div>

</div>

@endsection

