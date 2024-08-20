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
@endsection

@section('content')
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="signup-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="text-center">
                                <img src="{{ asset('plugins/frontend/img/bem.png') }}" alt="logo.png" width="10%">
                                <h2 class="" style="font-weight: 700">BEM Indonesia Mandiri</h2>
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Form Register</h3>
                                    </div>
                                </div>
                                <hr />
                                <div class="input-group">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Nama Lengkap">
                                    <span class="md-line"></span>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Alamat Email">
                                    <span class="md-line"></span>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Tentukan Password">
                                    <span class="md-line"></span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" placeholder="Konfirmasi Password" required
                                        autocomplete="new-password">
                                    <span class="md-line"></span>
                                </div>

                                <div class="input-group d-flex gap-2">
                                    <div class="d-flex align-items-center gap-1">
                                        <input id="0" type="radio" class="" name="gender" value="0">
                                        <label class="text-black mb-0" for="0">Perempuan</label>
                                    </div>
                                    <div class="d-flex align-items-center gap-1">
                                        <input id="1" type="radio" class="" name="gender" value="1">
                                        <label class="text-black mb-0" for="1">Laki-laki</label>
                                    </div>
                                    <div class="d-flex align-items-center gap-1">
                                        <input id="2" type="radio" class="" name="gender" value="2">
                                        <label class="text-black mb-0" for="2">Tidak ingin memberitahu</label>
                                    </div>
                                    <span class="md-line"></span>
                                </div>

                                <div class="input-group">
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

                                <div class="input-group">
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

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Register</button>
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
@endsection
