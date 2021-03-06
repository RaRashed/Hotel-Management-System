@extends('partials.layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Room Types
                <a href="{{ route('roomtype.index') }}" class="float-right btn btn-success btn-sm">View All</a>
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
            <form action="{{ route('roomtype.store')}}" method="post" enctype="multipart/form-data">

                @csrf

               <div   class="from-group">
                <label for="title">Title</label>

                <input type="text" id="title" class="form-control" name="title">

               </div>
               <div   class="from-group">
                <label for="title">Price</label>

                <input type="number" id="title" class="form-control" name="price">

               </div>

               <div   class="from-group">
                <label for="detail">Detail</label>

                <textarea name="detail" id="detail" cols="5" rows="5" class="form-control"></textarea>

               </div>
               <div   class="from-group">
                <label for="title">Images</label>

                <input type="file" multiple name="imgs[]"  class="form-control">

               </div>

               <div class="form-group">

                   <button class="btn btn-success mb-2">
                       Add Room
                   </button>
               </div>
            </form>
        </div>
    </div>

</div>

@endsection

