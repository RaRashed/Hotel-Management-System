@extends('frontend.layout.frontendlayout')
@section('content')
@if(Session::has('customerSession'))
<script type="text/javascript">
    window.location.href="{{ url('/') }}";
</script>

@endif
<div class="container">
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
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
                            @if(Session::has('success'))
                            <p class="text-success">{{ session('success') }}</p>

                            @endif
                                <form class="user" method="POST" action="{{ url('login_check') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                            id="username" name="email" aria-describedby="emailHelp"
                                            @if(Cookie::has('customeremail'))
                                            value="{{ Cookie::get('customeremail') }}"

                                            @endif
                                            placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" name="password"
                                            @if(Cookie::has('customerpassword'))
                                            value="{{ Cookie::get('customerpassword') }}"

                                            @endif
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" name="rememberme"
                                            @if(Cookie::has('customeremail'))
                                            checked

                                            @endif
                                            id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>



                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
