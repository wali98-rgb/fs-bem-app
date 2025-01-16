@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Silahkan verifikasi email yang telah kami kirim ke email anda.') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Link verifikasi baru telah dikirim.') }}
                            </div>
                        @endif

                        {{-- {{ __('Before proceeding, please check your email for a verification link.') }} --}}
                        {{ __('Tidak mendapatkan email?') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('Kirim Ulang') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
