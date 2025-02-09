@extends('admin.layouts.master')

@section('content')
    {{-- Page-header start --}}
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="bi bi-people bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Akun Para Pengguna</h4>
                        <span>Mengelola data akun pengguna dari setiap role.</span>
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
            <div class="card-header pb-0">
                <a href="{{ route('user.create') }}" class="btn btn-primary btn-round">Tambah Akun Pengguna</a>
                <h3 class="mt-4 ml-2 pb-2" style="font-weight: 700">Status : Admin</h3>
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
                                <th style="text-align: center">#</th>
                                <th>Foto Profil</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Departemen</th>
                                <th>Program Studi</th>
                                {{-- <th>Role</th> --}}
                                <th style="text-align: center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($userAdmin as $key=>$item)
                                <tr>
                                    <th style="text-align: center" scope="row">{{ $key + 1 }}</th>
                                    <td align="center">
                                        @if ($item->photo === null)
                                            <img src="{{ asset('images/profile_img/default-image.jpg') }}" alt=""
                                                style="width: 50px; height: 50px; object-fit: cover;"
                                                class="img-fluid img-circle">
                                        @else
                                            <img src="{{ asset($item->photo) }}" alt="{{ $item->name }}"
                                                style="width: 50px; height: 50px; object-fit: cover;"
                                                class="img-fluid img-circle">
                                        @endif
                                    </td>
                                    <td>{{ ucwords($item->name) }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->gender === '0')
                                            Perempuan
                                        @endif
                                        @if ($item->gender === '1')
                                            Laki-laki
                                        @endif
                                        @if ($item->gender === '2')
                                            Tidak Terdefinisi
                                        @endif
                                    </td>
                                    <td>
                                        Kabinet {{ ucwords($item->department->name_dpt) }}
                                    </td>
                                    <td>
                                        {{ $item->prodi->level }} {{ ucwords($item->prodi->name_prodi) }}
                                    </td>
                                    {{-- <td>
                                        @if ($item->role === 'bem')
                                            Anggota BEM
                                        @endif

                                        @if ($item->role === 'admin')
                                            Admin
                                        @endif
                                    </td> --}}
                                    <td align="center">
                                        <a href="{{ route('user.edit', $item->id) }}"
                                            class="btn btn-warning btn-round">Edit</a>
                                        <a href="{{ route('user.destroy', $item->id) }}" class="btn btn-danger btn-round"
                                            data-confirm-delete="true">HAPUS</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="8" style="text-align: center"><i>Data Departemen Kabinet belum
                                            diperbaharui.</i>
                                    </th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @if ($userAdmin->isEmpty())
                        {{ null }}
                    @else
                        <div class="d-flex justify-content-end pt-2">
                            {{ $userAdmin->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header pb-0">
                <a href="{{ route('user.access') }}" class="btn btn-success btn-round">Beri Akses Pengguna</a>
                <h3 class="mt-4 ml-2 pb-2" style="font-weight: 700">Status : Anggota BEM</h3>
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
                                <th style="text-align: center">#</th>
                                <th>Foto Profil</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Departemen</th>
                                <th>Program Studi</th>
                                {{-- <th>Role</th> --}}
                                <th style="text-align: center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($userBem as $key=>$item)
                                <tr>
                                    <th style="text-align: center" scope="row">{{ $key + 1 }}</th>
                                    <td align="center">
                                        @if ($item->photo === null)
                                            <img src="{{ asset('images/profile_img/default-image.jpg') }}" alt=""
                                                style="width: 50px; height: 50px; object-fit: cover;"
                                                class="img-fluid img-circle">
                                        @else
                                            <img src="{{ asset($item->photo) }}" alt="{{ $item->name }}"
                                                style="width: 50px; height: 50px; object-fit: cover;"
                                                class="img-fluid img-circle">
                                        @endif
                                    </td>
                                    <td>{{ ucwords($item->name) }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->gender === '0')
                                            Perempuan
                                        @endif
                                        @if ($item->gender === '1')
                                            Laki-laki
                                        @endif
                                        @if ($item->gender === '2')
                                            Tidak Terdefinisi
                                        @endif
                                    </td>
                                    <td>
                                        Kabinet {{ ucwords($item->department->name_dpt) }}
                                    </td>
                                    <td>
                                        {{ $item->prodi->level }} {{ ucwords($item->prodi->name_prodi) }}
                                    </td>
                                    {{-- <td>
                                        @if ($item->role === 'bem')
                                            Anggota BEM
                                        @endif

                                        @if ($item->role === 'admin')
                                            Admin
                                        @endif
                                    </td> --}}
                                    <td align="center">
                                        <a href="{{ route('user.edit', $item->id) }}"
                                            class="btn btn-warning btn-round">Edit</a>
                                        <a href="{{ route('user.destroy', $item->id) }}" class="btn btn-danger btn-round"
                                            data-confirm-delete="true">HAPUS</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="8" style="text-align: center"><i>Data Departemen Kabinet belum
                                            diperbaharui.</i>
                                    </th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @if ($userBem->isEmpty())
                        {{ null }}
                    @else
                        <div class="d-flex justify-content-end pt-2">
                            {{ $userBem->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- Page-body end --}}
@endsection
