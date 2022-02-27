@extends('partials.layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Booking
                <a href="{{ route('booking.index') }}" class="float-right btn btn-success btn-sm">View All</a>
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
            <form action="{{ route('booking.store')}}" method="post">

                @csrf

                <div   class="from-group">
                    <label for="title">Customer</label>

                    <select class="form-control" name="customer_id">
                        <option value="0">----select----</option>
                        @foreach ($customers as $customer )
                        <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
                        @endforeach
                    </select>

                   </div>
               <div   class="from-group">
                <label for="title">Room</label>

                <select class="form-control" name="room_id">
                    <option value="0">----select----</option>
                    @foreach ($rooms as $room )
                    <option value="{{ $room->id }}">{{ $room->title }}</option>
                    @endforeach
                </select>

               </div>
               <div   class="from-group">
                <label for="title">Checking Date</label>

                <input type="date" class="form-control checkin-date" name="checkin_date">

               </div>
               <div   class="from-group">
                <label for="title">Checkout Date</label>

                <input type="date" class="form-control" name="checkout_date">

               </div>
               <div   class="from-group">
                <label for="title">Total Adults</label>

                <input type="number" class="form-control" name="total_adults">

               </div>
               <div   class="from-group">
                <label for="title">Available Room</label>

                <select class="form-control">

                </select>



               </div>

               <div   class="from-group">
                <label for="title">Total Children</label>

                <input type="number" class="form-control" name="total_children">

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
                       Book Room
                   </button>
               </div>
            </form>
        </div>
    </div>

</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        $(".checkin-date").on('blur',function(){
            var checkindate=$(this).val();
            //console.log(checkindate);

            $.ajax({
                url:"{{ url('admin/booking/available-rooms') }}/"+checkindate,
                dataType: 'json',
                success:function(res){
                    console.log(res);
                }

            });

        });

    });
</script>

@endsection

