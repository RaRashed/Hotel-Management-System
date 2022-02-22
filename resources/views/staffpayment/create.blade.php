@extends('partials.layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Staff
                <a href="{{ route('staff.index') }}" class="float-right btn btn-success btn-sm">View All</a>
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
            <form action="{{ url('admin/staff/payment/'.$staff_id)}}" method="post">

                @csrf

               <div   class="from-group">
                <label for="title">Salary Amount</label>

                <input type="number" class="form-control" name="amount">

               </div>

               <div   class="from-group">
                <label for="title">Salary Amount</label>

                <input type="date" class="form-control" name="payment_date">

               </div>


               <div class="form-group">

                   <button class="btn btn-success mb-2">
                       Save Payment
                   </button>
               </div>
            </form>
        </div>
    </div>

</div>

@endsection

