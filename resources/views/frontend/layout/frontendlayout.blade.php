<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Management</title>



    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="{{ asset('asset/vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     @yield('fstyle')

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">Hotel Mangement</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Gallery</a>
              </li>

              @if (Session::has('customerSession'))
              <li class="nav-item">
                <a class="nav-link" href="{{ url('about_us') }}">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('contact_us') }}">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('logout') }}">Logout</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('customer/add-testimonial') }}">Add Testimonial</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-sm btn-danger" href="{{ url('booking') }}">Booking</a>
              </li>


              @else

              <li class="nav-item">
                <a class="nav-link" href="{{ url('about_us') }}">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('contact_us') }}">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('login') }}">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('register') }}">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-sm btn-danger" href="{{ url('login') }}">Booking</a>
              </li>

              @endif










            </ul>
          </div>
        </div>
      </nav>
      <!-- Slider Section Strat -->
      <main>
        @yield('content')

      </main>

        <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('asset/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('asset/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('asset/js/sb-admin-2.min.js') }}"></script>
    @yield('fscript')

</body>
</html>
