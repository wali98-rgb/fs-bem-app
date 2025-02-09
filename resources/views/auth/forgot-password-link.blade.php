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
                        <form class="md-float-material" action="{{ route('reset.password.post', ['token' => $token]) }}"
                            method="POST" name="update">
                            @csrf
                            <div class="text-center">
                                <img src="{{ asset('plugins/frontend/img/bem.png') }}" alt="logo.png" width="15%">
                                <h2 class="" style="font-weight: 700">BEM Indonesia Mandiri</h2>
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-10">
                                    <div class="col-md-12">
                                        <h3 class="text-center mt-1 txt-primary">Reset Password</h3>
                                    </div>
                                </div>
                                <hr style="color: black" />
                                <div class="input-group">
                                    <p style="color: black; font-size: .9rem; text-align: left;" class="m-0">
                                        Silahkan masukkan password yang baru.
                                    </p>
                                </div>

                                <div class="input-group">
                                    <input id="password" type="password" class="form-control" name="password"
                                        value="{{ old('password') }}" required autocomplete="password" autofocus
                                        placeholder="Masukkan Password Baru">
                                </div>

                                <div class="input-group">
                                    <input id="password_confirmation" type="password" class="form-control"
                                        name="password_confirmation" value="{{ old('password_confirmation') }}" required
                                        autocomplete="password_confirmation" autofocus
                                        placeholder="Ulangi Password Anda yang Baru">
                                </div>

                                <div class="input-group">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input" onclick="showPassword()"> Show
                                        Password
                                    </label>
                                </div>

                                <div class="row m-t-30 m-b-10">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center">Reset
                                            Password</button>
                                    </div>
                                </div>

                                <p class="text-inverse text-left m-b-0">
                                    <a href="{{ route('login') }}">
                                        Kembali ke login.
                                    </a>
                                </p>

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

            var x = document.getElementById("password_confirmation");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
