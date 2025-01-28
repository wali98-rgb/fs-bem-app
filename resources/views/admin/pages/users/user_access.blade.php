@extends('admin.layouts.master')

@section('content')
    {{-- Page-header start --}}
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="bi bi-people bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Pengelolaan Akses Pengguna</h4>
                        <span>Memberi akses pengguna untuk pengelolaan admin.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">
                                <i class="bi bi-columns-gap"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Halaman Utama</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Pengguna</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

    {{-- Page-body start --}}
    <div class="page-body">
        <div class="card">
            <form action="{{ route('user.addAccess') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-header pb-0">
                    <button type="submit" class="btn btn-success btn-round">Beri Akses</button>
                    <a href="{{ route('user.index') }}" class="btn btn-danger btn-round">Kembali ke Daftar Pengguna</a>
                    <h3 class="mt-4 ml-2 pb-2" style="font-weight: 700">Kategori : Anggota BEM</h3>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="icofont icofont-simple-left "></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                        </ul>
                    </div>
                </div>

                <div class="card-block table-border-style">
                    <div class="table-responsive p-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="text-align: center" width="10%">Pilih Pengguna</th>
                                    <th style="text-align: center">Foto Profil</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    @if (Auth::user()->role === 'superadmin')
                                        <th>Departemen</th>
                                    @endif
                                    <th style="text-align: center">Status Akses</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (Auth::user()->role === 'superadmin')
                                    @forelse ($user as $key=>$item)
                                        <tr>
                                            <td style="vertical-align: middle; text-align: center" scope="row">
                                                <input type="checkbox" class="btn-check"
                                                    id="access_user_{{ $item->id }}" name="access_user[]"
                                                    value="{{ $item->id }}">
                                                <label for="access_user_{{ $item->id }}"
                                                    class="btn btn-outline-primary">Pilih</label>
                                            </td>
                                            <td align="center">
                                                @if ($item->photo === null)
                                                    <img src="{{ asset('images/profile_img/default-image.jpg') }}"
                                                        alt="" style="width: 50px; height: 50px; object-fit: cover;"
                                                        class="img-fluid img-circle">
                                                @else
                                                    <img src="{{ asset($item->photo) }}" alt="{{ $item->name }}"
                                                        style="width: 50px; height: 50px; object-fit: cover;"
                                                        class="img-fluid img-circle">
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">{{ ucwords($item->name) }}</td>
                                            <td style="vertical-align: middle;">{{ $item->email }}</td>
                                            <td style="vertical-align: middle;">
                                                {{ optional($item->department)->name_dpt ? 'Departemen ' . ucwords(optional($item->department)->name_dpt) : 'Departemen Kabinet belum diatur.' }}
                                            </td>
                                            <td align="center" style="vertical-align: middle;">
                                                @if ($item->access_user === '0')
                                                    <label class="label label-inverse-danger">
                                                        Tidak Diizinkan
                                                    </label>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="6" style="text-align: center">
                                                <i class="text-secondary">Data Pengguna untuk diberi akses kosong.</i>
                                            </th>
                                        </tr>
                                    @endforelse
                                @elseif (Auth::user()->role === 'admin')
                                    @forelse ($userBemAdmin as $key=>$item)
                                        <tr>
                                            <td style="vertical-align: middle; text-align: center" scope="row">
                                                <input type="checkbox" name="access_user[]" value="{{ $item->id }}">
                                            </td>
                                            <td align="center">
                                                @if ($item->photo === null)
                                                    <img src="{{ asset('images/profile_img/default-image.jpg') }}"
                                                        alt="" style="width: 50px; height: 50px; object-fit: cover;"
                                                        class="img-fluid img-circle">
                                                @else
                                                    <img src="{{ asset($item->photo) }}" alt="{{ $item->name }}"
                                                        style="width: 50px; height: 50px; object-fit: cover;"
                                                        class="img-fluid img-circle">
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">{{ ucwords($item->name) }}</td>
                                            <td style="vertical-align: middle;">{{ $item->email }}</td>
                                            <td align="center" style="vertical-align: middle;">
                                                @if ($item->access_user === '0')
                                                    <label class="label label-inverse-danger">
                                                        Tidak Diizinkan
                                                    </label>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="5" style="text-align: center">
                                                <i class="text-secondary">Data Pengguna untuk diberi akses kosong.</i>
                                            </th>
                                        </tr>
                                    @endforelse
                                @endif
                            </tbody>
                        </table>

                        @if ($user->isEmpty())
                            {{ null }}
                        @else
                            <div class="d-flex justify-content-end pt-2">
                                {{ $user->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Page-body end --}}
@endsection
