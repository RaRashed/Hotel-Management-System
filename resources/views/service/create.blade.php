@extends('partials.layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Service
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
            <form action="{{ route('service.store')}}" method="post" enctype="multipart/form-data">

                @csrf

               <div   class="from-group">
                <label for="title">Title</label>

                <input type="text" id="title" class="form-control" name="title">

               </div>
               <div   class="from-group">
                <label for="title">Description</label>

                <input type="text" id="title" class="form-control" name="small_desc">

               </div>
               <div   class="from-group">
                <label for="title">Detail Description</label>

                <textarea name="detail_desc" id="" cols="30" rows="10" class="form-control"></textarea>

               </div>

               <div   class="from-group">
                <label for="title">Photo</label>

                <input type="file" class="form-control" name="photo">

               </div>






               <div class="form-group">

                   <button class="btn btn-success mb-2">
                       Add service
                   </button>
               </div>
            </form>
        </div>
    </div>

</div>

@endsection

