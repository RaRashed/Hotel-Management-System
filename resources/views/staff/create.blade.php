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
            <form action="{{ route('staff.store')}}" method="post" enctype="multipart/form-data">

                @csrf

               <div   class="from-group">
                <label for="title">Full Name</label>

                <input type="text" id="full_name" class="form-control" name="full_name">

               </div>
               <div   class="from-group">
                <label for="title">Department</label>


                <select class="form-control" name="department_id">
                    <option value="0">----select----</option>
                    @foreach ($departments as $department )
                    <option value="{{ $department->id }}">{{ $department->title }}</option>
                    @endforeach
                </select>



               </div>
               <div   class="from-group">
                <label for="title">Photo</label>

                <input type="file" class="form-control" name="photo">

               </div>
               <div   class="from-group">
                <label for="title">Bio</label>

                <textarea name="bio" id="" cols="5" rows="5" class="form-control"></textarea>


               </div>
               <div   class="from-group">
                <label for="title">Salary Type</label>
                <br>

                <input type="radio" name="salary_type" value="daily"> Daily
                <input type="radio" name="salary_type" value="monthly"> Monthly


               </div>

               <div   class="from-group">
                <label for="title">Salary Amount</label>

                <input type="number" id="salary_amt" class="form-control" name="salary_amt">

               </div>


               <div class="form-group">

                   <button class="btn btn-success mb-2">
                       Add Staff
                   </button>
               </div>
            </form>
        </div>
    </div>

</div>

@endsection

