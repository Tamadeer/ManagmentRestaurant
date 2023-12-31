@extends('layouts.master2')

@section('title')
    تسجيل الدخول
@stop


{{--@section('css')--}}
{{--    <!-- Sidemenu-respoansive-tabs css -->--}}
{{--    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="row no-gutter">--}}
{{--            <!-- The image half -->--}}
{{--            <!-- The content half -->--}}
{{--            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">--}}
{{--                <div class="login d-flex align-items-center py-2">--}}
{{--                    <!-- Demo content-->--}}
{{--                    <div class="container p-0">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">--}}
{{--                                <div class="card-sigin">--}}
{{--                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . $page='Home') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Mora<span>So</span>ft</h1></div>--}}
{{--                                    <div class="card-sigin">--}}
{{--                                        <div class="main-signup-header">--}}
{{--                                            <h2>مرحبا بك</h2>--}}
{{--                                            <h5 class="font-weight-semibold mb-4"> تسجيل الدخول</h5>--}}
{{--                                            <form method="POST" action="{{ route('login') }}">--}}
{{--                                                @csrf--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>البريد الالكتروني</label>--}}
{{--                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
{{--                                                    @error('email')--}}
{{--                                                    <span class="invalid-feedback" role="alert">--}}
{{--                                                     <strong>{{ $message }}</strong>--}}
{{--                                                     </span>--}}
{{--                                                    @enderror--}}
{{--                                                </div>--}}

{{--                                                <div class="form-group">--}}
{{--                                                    <label>كلمة المرور</label>--}}

{{--                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                                    @error('password')--}}
{{--                                                    <span class="invalid-feedback" role="alert">--}}
{{--                                                  <strong>{{ $message }}</strong>--}}
{{--                                                  </span>--}}
{{--                                                    @enderror--}}
{{--                                                    <div class="form-group row">--}}
{{--                                                        <div class="col-md-6 offset-md-4">--}}
{{--                                                            <div class="form-check">--}}
{{--                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
{{--                                                                <label class="form-check-label" for="remember">--}}
{{--                                                                    {{ __('تذكرني') }}--}}
{{--                                                                </label>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <button type="submit" class="btn btn-main-primary btn-block">--}}
{{--                                                    {{ __('تسجيل الدخول') }}--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div><!-- End -->--}}
{{--                </div>--}}
{{--            </div><!-- End -->--}}

{{--            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">--}}
{{--                <div class="row wd-100p mx-auto text-center">--}}
{{--                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">--}}
{{--                        <img src="{{URL::asset('assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--@endsection--}}


<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>تسجيل الدخول </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="{{asset('loginpage/images/icons/favicon.ico')}}"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('loginpage/vendor/bootstrap/css/bootstrap.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('loginpage/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('loginpage/vendor/animate/animate.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('loginpage/vendor/css-hamburgers/hamburgers.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('loginpage/vendor/select2/select2.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('loginpage/css/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('loginpage/css/main.css')}}">
        <!--===============================================================================================-->
    </head>
    <body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{asset('loginpage/images/img-01.png')}}" alt="IMG">
                </div>

                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title">
						Member Login
					</span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100 @error('password') is-invalid @enderror " type="password" name="password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button  type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">

                        @if (Route::has('password.request'))
                            <a class="txt2 underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="{{route('register')}}">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="{{asset('loginpage/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('loginpage/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('loginpage/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('loginpage/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('loginpage/vendor/tilt/tilt.jquery.min.js')}}"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{asset('loginpage/js/main.js')}}"></script>

    </body>
    </html>










    {{--@extends('layouts.master2')--}}

    {{--@section('title')--}}
    {{--    تسجيل الدخول--}}
    {{--@stop--}}


    {{--@section('css')--}}
    {{--    <!-- Sidemenu-respoansive-tabs css -->--}}
    {{--    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">--}}
    {{--@endsection--}}
    {{--@section('content')--}}
    {{--    <div class="container-fluid">--}}
    {{--        <div class="row no-gutter">--}}
    {{--            <!-- The image half -->--}}
    {{--            <!-- The content half -->--}}
    {{--            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">--}}
    {{--                <div class="login d-flex align-items-center py-2">--}}
    {{--                    <!-- Demo content-->--}}
    {{--                    <div class="container p-0">--}}
    {{--                        <div class="row">--}}
    {{--                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">--}}
    {{--                                <div class="card-sigin">--}}
    {{--                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . $page='Home') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Mora<span>So</span>ft</h1></div>--}}
    {{--                                    <div class="card-sigin">--}}
    {{--                                        <div class="main-signup-header">--}}
    {{--                                            <h2>مرحبا بك</h2>--}}
    {{--                                            <h5 class="font-weight-semibold mb-4"> تسجيل الدخول</h5>--}}
    {{--                                            <form method="POST" action="{{ route('login') }}">--}}
    {{--                                                @csrf--}}
    {{--                                                <div class="form-group">--}}
    {{--                                                    <label>البريد الالكتروني</label>--}}
    {{--                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
    {{--                                                    @error('email')--}}
    {{--                                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                                     <strong>{{ $message }}</strong>--}}
    {{--                                                     </span>--}}
    {{--                                                    @enderror--}}
    {{--                                                </div>--}}

    {{--                                                <div class="form-group">--}}
    {{--                                                    <label>كلمة المرور</label>--}}

    {{--                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

    {{--                                                    @error('password')--}}
    {{--                                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                                  <strong>{{ $message }}</strong>--}}
    {{--                                                  </span>--}}
    {{--                                                    @enderror--}}
    {{--                                                    <div class="form-group row">--}}
    {{--                                                        <div class="col-md-6 offset-md-4">--}}
    {{--                                                            <div class="form-check">--}}
    {{--                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
    {{--                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
    {{--                                                                <label class="form-check-label" for="remember">--}}
    {{--                                                                    {{ __('تذكرني') }}--}}
    {{--                                                                </label>--}}
    {{--                                                            </div>--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                                <button type="submit" class="btn btn-main-primary btn-block">--}}
    {{--                                                    {{ __('تسجيل الدخول') }}--}}
    {{--                                                </button>--}}
    {{--                                            </form>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div><!-- End -->--}}
    {{--                </div>--}}
    {{--            </div><!-- End -->--}}

    {{--            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">--}}
    {{--                <div class="row wd-100p mx-auto text-center">--}}
    {{--                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">--}}
    {{--                        <img src="{{URL::asset('assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </div>--}}
    {{--@endsection--}}
    {{--@section('js')--}}
    {{--@endsection--}}








{{--@extends('layouts.master2')--}}

{{--@section('title')--}}
{{--    تسجيل الدخول--}}
{{--@stop--}}


{{--@section('css')--}}
{{--    <!-- Sidemenu-respoansive-tabs css -->--}}
{{--    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="row no-gutter">--}}
{{--            <!-- The image half -->--}}
{{--            <!-- The content half -->--}}
{{--            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">--}}
{{--                <div class="login d-flex align-items-center py-2">--}}
{{--                    <!-- Demo content-->--}}
{{--                    <div class="container p-0">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">--}}
{{--                                <div class="card-sigin">--}}
{{--                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . $page='Home') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Mora<span>So</span>ft</h1></div>--}}
{{--                                    <div class="card-sigin">--}}
{{--                                        <div class="main-signup-header">--}}
{{--                                            <h2>مرحبا بك</h2>--}}
{{--                                            <h5 class="font-weight-semibold mb-4"> تسجيل الدخول</h5>--}}
{{--                                            <form method="POST" action="{{ route('login') }}">--}}
{{--                                                @csrf--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>البريد الالكتروني</label>--}}
{{--                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
{{--                                                    @error('email')--}}
{{--                                                    <span class="invalid-feedback" role="alert">--}}
{{--                                                     <strong>{{ $message }}</strong>--}}
{{--                                                     </span>--}}
{{--                                                    @enderror--}}
{{--                                                </div>--}}

{{--                                                <div class="form-group">--}}
{{--                                                    <label>كلمة المرور</label>--}}

{{--                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                                    @error('password')--}}
{{--                                                    <span class="invalid-feedback" role="alert">--}}
{{--                                                  <strong>{{ $message }}</strong>--}}
{{--                                                  </span>--}}
{{--                                                    @enderror--}}
{{--                                                    <div class="form-group row">--}}
{{--                                                        <div class="col-md-6 offset-md-4">--}}
{{--                                                            <div class="form-check">--}}
{{--                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
{{--                                                                <label class="form-check-label" for="remember">--}}
{{--                                                                    {{ __('تذكرني') }}--}}
{{--                                                                </label>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <button type="submit" class="btn btn-main-primary btn-block">--}}
{{--                                                    {{ __('تسجيل الدخول') }}--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div><!-- End -->--}}
{{--                </div>--}}
{{--            </div><!-- End -->--}}

{{--            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">--}}
{{--                <div class="row wd-100p mx-auto text-center">--}}
{{--                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">--}}
{{--                        <img src="{{URL::asset('assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--@endsection--}}
