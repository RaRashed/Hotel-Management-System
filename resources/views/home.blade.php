@extends('frontend.layout.frontendlayout')
@section('content')

<div class="container">
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('asset/img/h1.jpeg') }}" class="d-block w-100" height="500px" width="1600px" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('asset/img/h2.jpg') }}" class="d-block w-100" height="500px" width="1600px"  alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('asset/img/h3.jpg') }}" class="d-block w-100" height="500px" width="1600px" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

   <!-- Slider Section End -->

   <!-- Service Section Strat -->
   <div class="container my-4">
    <h1 class="text-center border-bottom">Services</h1>
    <div class="row my-4">
    <div class="col-md-4">
     <img src="{{ asset('asset/img/h4.jpg') }}" class="img-thumbnail" alt="...">
    </div>
    <div class="col-md-8">
        <h3>Service Heading</h3>
        <p>Looking to quickly add Bootstrap to your project? Use jsDelivr, a free open source CDN. Using a package manager or need to download the source files</p>
        <p>
            <a href="" class="btn btn-sm btn-primary">Read More</a>
        </p>

    </div>
    </div>
    <div class="row my-4">
        <div class="col-md-4">
         <img src="{{ asset('asset/img/h5.jpg') }}" class="img-thumbnail" alt="...">
        </div>
        <div class="col-md-8">
            <h3>Service Heading</h3>
            <p>Looking to quickly add Bootstrap to your project? Use jsDelivr, a free open source CDN. Using a package manager or need to download the source files</p>
            <p>
                <a href="" class="btn btn-sm btn-primary">Read More</a>
            </p>

        </div>
        </div>
</div>


   <!-- Service Section End -->
   <!-- Gallery Section Start -->

   <div class="container my-4">
    <h1 class="text-center border-bottom">Gallery</h1>
    <div class="row my-4">
@foreach ($roomtypes as $rtype )
<div class="col-md-3">
<div class="card">
    <h5 class="card-header">{{ $rtype->title }}</h5>
    <div class="card-body">



        <table class="table table-bordered">
            <tr>

                @foreach ($rtype->roomtypeimages as $index=> $img )
                <td class="imgcol{{ $img->id }}">
                    <a href="{{asset('storage/'.$img->image_src)}}" data-lightbox="rgallery{{ $rtype->id }}">
                        @if($index > 0)
                        <img class="img-fluid hide" src="{{asset('storage/'.$img->image_src)}}" width="150px" height="100px" alt="">
                        @else
                        <img class="img-fluid" src="{{asset('storage/'.$img->image_src)}}" width="150px" height="100px" alt="">

                        @endif

                    </a>
                                  </td>

                @endforeach

            </tr>

        </table>
    </div>
</div>
</div>

@endforeach



    </div>
   </div>
</div>
   @section('fstyle')

   <style>
       .hide{
           display: none;
       }
   </style>

   @endsection

   @section('fscript')

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@endsection
