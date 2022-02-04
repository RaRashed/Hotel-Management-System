@extends('partials.layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rooms
                <a href="{{ route('rooms.index') }}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">

            <form >

                @csrf
                @method('put')

               <div   class="from-group">
                <label for="title">Title : </label>
                {{ $roomtype->title }}

               </div>
               <div   class="from-group">
                <label for="title">Price : </label>
                {{ $roomtype->price }}

               </div>
               <div   class="from-group">
                <label for="title">Room Type : </label>
                {{ $roomtype->detail}}

               </div>


            </form>
        </div>
    </div>

</div>

@endsection

