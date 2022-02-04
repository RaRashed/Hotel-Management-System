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
            <form action="{{ route('customer.update',$customer->id)}}" method="post" enctype="multipart/form-data">

                @csrf
                @method('put')

               <div   class="from-group">
                <label for="title">Full Name</label>

                <input type="text" class="form-control" name="full_name" value="{{ $customer->full_name }}">

               </div>
               <div   class="from-group">
                <label for="title">Email</label>

                <input type="email" class="form-control" name="email" value="{{ $customer->email }}">

               </div>
               <div   class="from-group">
                <label for="title">Password</label>

                <input type="password" class="form-control" name="password" value="{{ $customer->password }}">

               </div>
               <div   class="from-group">
                <label for="title">Phone</label>

                <input type="text" class="form-control" name="phone" value="{{ $customer->phone}}">

               </div>
               <div   class="from-group">
                <label for="title">Address</label>

                <input type="text" class="form-control" name="address" value="{{ $customer->address }}">

               </div>
               <div   class="from-group">
                <label for="title">Photo</label>

                <input type="file" class="form-control" name="photo" value="{{ $customer->photo }}">
                <input type="hidden" value="{{$customer->photo}}" name="prev_photo" >
                <img src="{{ asset('storage/'.$customer->photo) }}" height="100px" width="100px">

               </div>
              {{-- <div   class="from-group">
                <label for="title">Title</label>


                <select class="form-control" name="room_type_id" id="">
                    <option value="0">----select----</option>
                    @foreach ($roomtypes as $roomtype )
                    <option value="{{ $roomtype->id }}">{{ $roomtype->title }}</option>
                    @endforeach
                </select>



               </div>
--}}
               <div class="form-group">

                   <button class="btn btn-success mb-2">
                       Update Customer
                   </button>
               </div>
            </form>
        </div>
    </div>

</div>

@endsection

