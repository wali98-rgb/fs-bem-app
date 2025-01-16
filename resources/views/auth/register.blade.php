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
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="signup-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" action="{{ route('register.action') }}" method="POST">
                            @csrf
                            <div class="text-center">
                                <img src="{{ asset('plugins/frontend/img/bem.png') }}" alt="logo.png" width="10%">
                                <h2 class="" style="font-weight: 700">BEM Indonesia Mandiri</h2>
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-10">
                                    <div class="col-md-12">
                                        <h3 class="text-center mt-1 txt-primary">Form Register</h3>
                                    </div>
                                </div>
                                <hr style="color: black" />
                                <div class="row">
                                    <div class="col input-group">
                                        <input id="name" type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus
                                            placeholder="Nama Lengkap">
                                    </div>
                                    <div class="col input-group">
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Alamat Email">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col input-group">
                                        <input id="password" type="password" class="form-control" name="password" required
                                            autocomplete="new-password" placeholder="Tentukan Password">
                                    </div>

                                    <div class="col input-group">
                                        <input id="password_confirmation" type="password" class="form-control"
                                            name="password_confirmation" placeholder="Konfirmasi Password" required
                                            autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input" onclick="showPassword()"> Show
                                        Password
                                    </label>
                                </div>

                                <div class="input-group justify-content-center d-flex gap-4">
                                    <div class="d-flex align-items-center gap-1">
                                        <input id="0" type="radio" class="" name="gender" value="0">
                                        <label class="text-black mb-0" for="0"><i class="bi bi-gender-male"
                                                style="color: palevioletred"></i>
                                            Perempuan</label>
                                    </div>
                                    <div class="d-flex align-items-center gap-1">
                                        <input id="1" type="radio" class="" name="gender" value="1">
                                        <label class="text-black mb-0" for="1"><i class="bi bi-gender-female"
                                                style="color: blue"></i>
                                            Laki-laki</label>
                                    </div>
                                    <div class="d-flex align-items-center gap-1">
                                        <input id="2" type="radio" class="" name="gender" value="2">
                                        <label class="text-black mb-0" for="2"><i class="bi bi-gender-neuter"
                                                style="color: gray"></i>
                                            Tidak ingin memberitahu</label>
                                    </div>
                                    <span class="md-line"></span>
                                </div>

                                <div class="row">
                                    <div class="col input-group">
                                        <select name="prodi_id" class="form-control">
                                            <option disabled selected>-- Pilih Program Studi --</option>
                                            @forelse ($prodis as $item)
                                                <option value="{{ $item->id }}">{{ $item->name_prodi }}
                                                    {{ $item->level }}</option>
                                            @empty
                                                <option value="" disabled>Program Studi belum diperbarui.</option>
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="col input-group">
                                        <select name="dept_id" class="form-control">
                                            <option disabled selected>-- Pilih Departemen Kabinet --</option>
                                            @forelse ($depts as $item)
                                                <option value="{{ $item->id }}">{{ $item->name_dpt }}</option>
                                            @empty
                                                <option value="" disabled>Departemen Kabinet belum diperbarui.
                                                </option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="row m-t-30 m-b-10">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center">Register</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Sudah punya akun? <a
                                                href="{{ route('login') }}">Login sekarang.</a></p>
                                    </div>
                                </div>
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
