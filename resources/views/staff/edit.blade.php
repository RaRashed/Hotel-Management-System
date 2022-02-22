@extends('partials.layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Update {{ $staff->full_name }}
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
            <form action="{{ route('staff.update',$staff->id)}}" method="post" enctype="multipart/form-data">

                @csrf
                @method('put')

                <div   class="from-group">
                    <label for="title">Full Name</label>

                    <input type="text" id="full_name" class="form-control" name="full_name" value="{{ $staff->full_name }}">

                   </div>
                   <div   class="from-group">
                    <label for="title">Department</label>


                    <select class="form-control" name="department_id">
                        <option value="0">----select----</option>
                        @foreach ($departments as $department )
                        <option @if($staff->department_id==$department->id)
                            selected

                        @endif value="{{ $department->id }}">{{ $department->title }}</option>
                        @endforeach
                    </select>



                   </div>
                   <div   class="from-group">
                    <label for="title">Photo</label>

                    <input type="file" class="form-control" name="photo">
                    <input type="hidden" value="{{$staff->photo}}" name="prev_photo" >
                    <img src="{{ asset('storage/'.$staff->photo) }}" height="100px" width="100px">

                   </div>
                   <div   class="from-group">
                    <label for="title">Bio</label>

                    <textarea name="bio" id="" cols="5" rows="5" class="form-control">{{ $staff->bio }}</textarea>


                   </div>
                   <div   class="from-group">
                    <label for="title">Salary Type</label>

                    <br>

                    <input @if($staff->salary_type=='daily')
                    checked

                    @endif type="radio" name="salary_type" value="daily"> Daily
                    <input @if($staff->salary_type=='monthly')
                    checked

                    @endif type="radio" name="salary_type" value="monthly"> Monthly

                   </div>

                   <div   class="from-group">
                    <label for="title">Salary Amount</label>

                    <input type="text" id="salary_amt" class="form-control" name="salary_amt" value="{{ $staff->salary_amt }}">

                   </div>


                   <div class="form-group">

                       <button class="btn btn-success mb-2">
                           Update Staff
                       </button>
                   </div>
            </form>
        </div>
    </div>

</div>

@endsection

