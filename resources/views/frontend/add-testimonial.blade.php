@extends('frontend.layout.frontendlayout')
@section('content')
<div class="container my-4">
<h3 class="mb-3">Add Testimonial</h3>
@if (Session::has('success'))
<p class="text-success">{{ session('success') }}</p>

@endif
<form action="{{ url('customer/save-testimonial') }}" method="POST">

    @csrf
    <table class="table table-bordered">
        <tr>
            <th>Testimonial</th>
            <td>
                <textarea name="testi_cont" id="" cols="10" rows="10" class="form-control"></textarea>
                <input type="hidden" name="customer_id" value="{{session('customerSession')[0]->id  }}">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" class="btn btn-primary" value="Add Testimonial">
            </td>
        </tr>

    </table>
</form>

</div>

@endsection
