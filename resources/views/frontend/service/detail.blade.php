@extends('frontend.layout.frontendlayout')
@section('content')
<div class="container my-4">
    <div class="card offset-2">
        <div class="card-body">
            <h3>{{ $service->title }}</h3>
            <p> {{ $service->detail_desc }}</p>
        </div>
    </div>

</div>

@endsection
