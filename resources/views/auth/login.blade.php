@extends('layouts.app')

@section('css_auth')
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection

@section('content')
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="text-center">
                                <img src="{{ asset('plugins/frontend/img/bem.png') }}" alt="logo.png" width="15%">
                                <h2 class="" style="font-weight: 700">BEM Indonesia Mandiri</h2>
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-10">
                                    <div class="col-md-12">
                                        <h3 class="text-center mt-1 txt-primary">Login</h3>
                                    </div>
                                </div>
                                <hr style="color: black" />
                                <div class="input-group">
                                    <input id="email" type="email" class="form-control" name="email" required
                                        autocomplete="email" autofocus placeholder="Masukkan Alamat Email"
                                        @if (isset($_COOKIE['email'])) value="{{ $_COOKIE['email'] }}"
                                        @else value="{{ old('email') }}" @endif>
                                </div>
                                <div class="input-group mb-1">
                                    <input id="password" type="password" class="form-control" name="password" required
                                        autocomplete="current-password" placeholder="Masukkan Password"
                                        @if (isset($_COOKIE['password'])) value="{{ $_COOKIE['password'] }}"
                                        @else value="{{ old('password') }}" @endif>
                                </div>

                                <div class="input-group d-flex justify-content-end mt-0 mb-2">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input" onclick="showPassword()"> Show
                                        Password
                                    </label>
                                </div>

                                <div class="row m-t-25 text-left">
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" name="remember"
                                                    @if (isset($_COOKIE['email'])) checked @endif>
                                                <span class="cr"><i
                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Remember me</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12 forgot-phone text-right">
                                        <a href="{{ route('forgot.password.get') }}"
                                            class="text-right f-w-600 text-inverse">
                                            Lupa Password?</a>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-5">Login</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p style="color: black; font-size: .9rem" class="m-b-5">atau</p>
                                    </div>
                                </div>

                                <div class="row m-t-30 m-b-10">
                                    <div class="col-md-12">
                                        <a href="{{ route('redirect') }}"
                                            class="btn btn-danger d-flex align-items-center justify-content-center">
                                            <i class="bi bi-google"></i>
                                            Login dengan Google
                                        </a>
                                    </div>
                                </div>

                                <p class="text-inverse text-left m-b-0">Belum punya akun? <a
                                        href="{{ route('register') }}">Register Sekarang.</a></p>

                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
@endsection

@section('js_auth')
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/popper.js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('assets/js/modernizr/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/modernizr/css-scrollbars.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/common-pages.js') }}"></script>

    <script type="text/javascript">
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
