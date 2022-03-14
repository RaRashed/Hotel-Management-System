@extends('frontend.layout.frontendlayout')
@section('content')
<div class="container my-4">
<h3 class="mb-3">Add Testimonial</h3>
@if (Session::has('success'))
<p class="text-success">{{ session('success') }}</p>

@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ url('save-contact') }}" method="POST">

    @csrf
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td>
                <input type="text" class="form-control" name="name">
            </td>
        </tr>
        <tr>
            <th>Email</th>
            <td>
                <input type="email" class="form-control" name="email">
            </td>
        </tr>
        <tr>
            <th>Subject</th>
            <td>
                <input type="text" class="form-control" name="subject">
            </td>
        </tr>
        <tr>
            <th>Message</th>
            <td>
                <textarea name="msg" id="" cols="10" rows="10" class="form-control"></textarea>
            </td>
        </tr>

        <tr>
            <td>
                <input type="submit" class=" btn btn-primary" value="Add Testimonial">
            </td>
        </tr>

    </table>
</form>

</div>

@endsection
