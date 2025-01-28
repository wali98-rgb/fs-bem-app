@extends('admin.layouts.master')

@section('content')
    {{-- Page-header start --}}
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="bi bi-people bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Daftar Akun Pengguna</h4>
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
        @if (Auth::user()->role === 'superadmin')
            <div class="card">
                <div class="card-header pb-0">
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-round">Tambah Akun Pengguna</a>
                    <h3 class="mt-4 ml-2 pb-2" style="font-weight: 700">Kategori : Admin</h3>
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
                                    <th>Status Verifikasi</th>
                                    <th style="text-align: center">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($userAdmin as $key=>$item)
                                    <tr>
                                        <th style="vertical-align: middle; text-align: center" scope="row">
                                            {{ $key + 1 }}</th>
                                        <td align="center">
                                            @if ($item->photo === null)
                                                <img src="{{ asset('images/profile_img/default-image.jpg') }}"
                                                    alt="" style="width: 50px; height: 50px; object-fit: cover;"
                                                    class="img-fluid img-circle">
                                            @elseif ($item->photo !== null && !file_exists($item->photo))
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
                                        <td style="vertical-align: middle;" align="center">
                                            @if ($item->gender === '0')
                                                <i class="bi bi-gender-male" style="color: palevioletred"></i> - P
                                            @endif
                                            @if ($item->gender === '1')
                                                <i class="bi bi-gender-female" style="color: blue"></i> - L
                                            @endif
                                            @if ($item->gender === '2')
                                                <i class="bi bi-gender-neuter" style="color: gray"></i> - N/A
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle;">
                                            @if (optional($item->department)->name_dpt)
                                                Departemen {{ ucwords(optional($item->department)->name_dpt) }}
                                            @else
                                                <i class="text-secondary">Departemen Kabinet belum diatur.</i>
                                            @endif
                                            {{-- {{ optional($item->department)->name_dpt ? 'Departemen ' . ucwords(optional($item->department)->name_dpt) : 'Departemen Kabinet belum diatur.' }} --}}
                                        </td>
                                        <td style="vertical-align: middle;">
                                            @if (optional($item->prodi)->level)
                                                {{ optional($item->prodi)->level . ' ' . ucwords(optional($item->prodi)->name_prodi) }}
                                            @else
                                                <i class="text-secondary">Program Studi belum diatur.</i>
                                            @endif
                                            {{-- {{ optional($item->prodi)->level ? optional($item->prodi)->level . ' ' . ucwords(optional($item->prodi)->name_prodi) : 'Program Studi belum diatur.' }} --}}
                                        </td>
                                        <td style="vertical-align: middle;">
                                            @if ($item->verification_status === '1')
                                                <label class="label label-inverse-info">
                                                    Telah Terverifikasi
                                                </label>
                                            @elseif ($item->verification_status === '0')
                                                <label class="label label-inverse-danger">
                                                    Belum Terverifikasi
                                                </label>
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle;" align="center">
                                            <a href="{{ route('user.edit', $item->id) }}"
                                                class="btn btn-warning btn-round">Edit</a>
                                            <a href="{{ route('user.destroy', $item->id) }}"
                                                class="btn btn-danger btn-round" data-confirm-delete="true">HAPUS</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="8" style="vertical-align: middle; text-align: center">
                                            <i class="text-secondary">Data Pengguna belum diperbaharui.</i>
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
        @endif

        <div class="card">
            <div class="card-header pb-0">
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-round">Tambah Akun Pengguna</a>
                @endif
                <a href="{{ route('user.access') }}" class="btn btn-success btn-round">
                    Beri Akses Pengguna
                </a>
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
                                <th style="text-align: center" width="5%">#</th>
                                <th style="text-align: center">Foto Profil</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Gender</th>
                                @if (Auth::user()->role === 'superadmin')
                                    <th>Departemen</th>
                                @endif
                                <th>Program Studi</th>
                                <th>Status Verifikasi</th>
                                <th style="text-align: center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Auth::user()->role === 'superadmin')
                                @forelse ($userBem as $key=>$item)
                                    <tr>
                                        <th style="vertical-align: middle; text-align: center" scope="row">
                                            {{ $key + 1 }}</th>
                                        <td align="center">
                                            @if ($item->photo === null)
                                                <img src="{{ asset('images/profile_img/default-image.jpg') }}"
                                                    alt="" style="width: 50px; height: 50px; object-fit: cover;"
                                                    class="img-fluid img-circle">
                                            @elseif ($item->photo !== null && !file_exists($item->photo))
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
                                        <td style="vertical-align: middle;" align="center">
                                            @if ($item->gender === '0')
                                                <i class="bi bi-gender-male" style="color: palevioletred"></i> - P
                                            @endif
                                            @if ($item->gender === '1')
                                                <i class="bi bi-gender-female" style="color: blue"></i> - L
                                            @endif
                                            @if ($item->gender === '2')
                                                <i class="bi bi-gender-neuter" style="color: gray"></i> - N/A
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle;">
                                            @if (optional($item->department)->name_dpt)
                                                Departemen {{ ucwords(optional($item->department)->name_dpt) }}
                                            @else
                                                <i class="text-secondary">Departemen Kabinet belum diatur.</i>
                                            @endif
                                            {{-- {{ optional($item->department)->name_dpt ? 'Departemen ' . ucwords(optional($item->department)->name_dpt) : 'Departemen Kabinet belum diatur.' }} --}}
                                        </td>
                                        <td style="vertical-align: middle;">
                                            @if (optional($item->prodi)->level)
                                                {{ optional($item->prodi)->level . ' ' . ucwords(optional($item->prodi)->name_prodi) }}
                                            @else
                                                <i class="text-secondary">Program Studi belum diatur.</i>
                                            @endif
                                            {{-- {{ optional($item->prodi)->level ? optional($item->prodi)->level . ' ' . ucwords(optional($item->prodi)->name_prodi) : 'Program Studi belum diatur.' }} --}}
                                        </td>
                                        <td style="vertical-align: middle;">
                                            @if ($item->verification_status === '1')
                                                <label class="label label-inverse-info">
                                                    Telah Terverifikasi
                                                </label>
                                            @elseif ($item->verification_status === '0')
                                                <label class="label label-inverse-danger">
                                                    Belum Terverifikasi
                                                </label>
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle;" align="center">
                                            @if (Auth::user()->role === 'superadmin')
                                                <a href="{{ route('user.edit', $item->id) }}"
                                                    class="btn btn-warning btn-round">Edit</a>
                                            @elseif (Auth::user()->role === 'admin')
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#editModal"
                                                    data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                    data-email="{{ $item->email }}"
                                                    class="btn btn-warning btn-round btn-edit">Edit</button>
                                            @endif
                                            <a href="{{ route('user.destroy', $item->id) }}"
                                                class="btn btn-danger btn-round" data-confirm-delete="true">HAPUS</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="9" style="vertical-align: middle; text-align: center">
                                            <i class="text-secondary">Data Pengguna belum diperbaharui.</i>
                                        </th>
                                    </tr>
                                @endforelse
                            @elseif (Auth::user()->role === 'admin')
                                @forelse ($userBemAdmin as $key=>$item)
                                    <tr>
                                        <th style="vertical-align: middle; text-align: center" scope="row">
                                            {{ $key + 1 }}</th>
                                        <td align="center">
                                            @if ($item->photo === null)
                                                <img src="{{ asset('images/profile_img/default-image.jpg') }}"
                                                    alt="" style="width: 50px; height: 50px; object-fit: cover;"
                                                    class="img-fluid img-circle">
                                            @elseif ($item->photo !== null && !file_exists($item->photo))
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
                                        <td style="vertical-align: middle;" align="center">
                                            @if ($item->gender === '0')
                                                <i class="bi bi-gender-male" style="color: palevioletred"></i> - P
                                            @endif
                                            @if ($item->gender === '1')
                                                <i class="bi bi-gender-female" style="color: blue"></i> - L
                                            @endif
                                            @if ($item->gender === '2')
                                                <i class="bi bi-gender-neuter" style="color: gray"></i> - N/A
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle;">
                                            @if (optional($item->prodi)->level)
                                                {{ optional($item->prodi)->level . ' ' . ucwords(optional($item->prodi)->name_prodi) }}
                                            @else
                                                <i class="text-secondary">Program Studi belum diatur.</i>
                                            @endif
                                            {{-- {{ optional($item->prodi)->level ? optional($item->prodi)->level . ' ' . ucwords(optional($item->prodi)->name_prodi) : 'Program Studi belum diatur.' }} --}}
                                        </td>
                                        <td style="vertical-align: middle;">
                                            @if ($item->verification_status === '1')
                                                <label class="label label-inverse-info">
                                                    Telah Terverifikasi
                                                </label>
                                            @elseif ($item->verification_status === '0')
                                                <label class="label label-inverse-danger">
                                                    Belum Terverifikasi
                                                </label>
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle;" align="center">
                                            @if (Auth::user()->role === 'superadmin')
                                                <a href="{{ route('user.edit', $item->id) }}"
                                                    class="btn btn-warning btn-round">Edit</a>
                                            @elseif (Auth::user()->role === 'admin')
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#editModal"
                                                    data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                    data-email="{{ $item->email }}"
                                                    class="btn btn-warning btn-round btn-edit">Edit</button>
                                            @endif
                                            <a href="{{ route('user.destroy', $item->id) }}"
                                                class="btn btn-danger btn-round" data-confirm-delete="true">HAPUS</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="8" style="vertical-align: middle; text-align: center">
                                            <i class="text-secondary">Data Pengguna belum diperbaharui.</i>
                                        </th>
                                    </tr>
                                @endforelse
                            @endif
                        </tbody>
                    </table>
                    @if ($userBem->isEmpty() || $userBemAdmin->isEmpty())
                        {{ null }}
                    @else
                        <div class="d-flex justify-content-end pt-2">
                            @if ($userBem)
                                {{ $userBem->links() }}
                            @elseif ($userBemAdmin)
                                {{ $userBemAdmin->links() }}
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if (Auth::user()->role === 'superadmin')
            @if (!$userisAccessBySuperadmin->isEmpty())
                <div class="card">
                    <div class="card-header pb-0">
                        <h3 class="mt-4 ml-2 pb-2" style="font-weight: 700">Status Akses Pengguna : Diizinkan</h3>
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
                                        <th style="text-align: center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($userisAccessBySuperadmin as $key=>$item)
                                        <tr>
                                            <th style="vertical-align: middle; text-align: center" scope="row">
                                                {{ $key + 1 }}</th>
                                            <td align="center">
                                                @if ($item->photo === null)
                                                    <img src="{{ asset('images/profile_img/default-image.jpg') }}"
                                                        alt=""
                                                        style="width: 50px; height: 50px; object-fit: cover;"
                                                        class="img-fluid img-circle">
                                                @elseif ($item->photo !== null && !file_exists($item->photo))
                                                    <img src="{{ asset('images/profile_img/default-image.jpg') }}"
                                                        alt=""
                                                        style="width: 50px; height: 50px; object-fit: cover;"
                                                        class="img-fluid img-circle">
                                                @else
                                                    <img src="{{ asset($item->photo) }}" alt="{{ $item->name }}"
                                                        style="width: 50px; height: 50px; object-fit: cover;"
                                                        class="img-fluid img-circle">
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">{{ ucwords($item->name) }}</td>
                                            <td style="vertical-align: middle;">{{ $item->email }}</td>
                                            <td style="vertical-align: middle;" align="center">
                                                @if ($item->gender === '0')
                                                    <i class="bi bi-gender-male" style="color: palevioletred"></i> - P
                                                @endif
                                                @if ($item->gender === '1')
                                                    <i class="bi bi-gender-female" style="color: blue"></i> - L
                                                @endif
                                                @if ($item->gender === '2')
                                                    <i class="bi bi-gender-neuter" style="color: gray"></i> - N/A
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if (optional($item->department)->name_dpt)
                                                    Departemen {{ ucwords(optional($item->department)->name_dpt) }}
                                                @else
                                                    <i class="text-secondary">Departemen Kabinet belum diatur.</i>
                                                @endif
                                                {{-- {{ optional($item->department)->name_dpt ? 'Departemen ' . ucwords(optional($item->department)->name_dpt) : 'Departemen Kabinet belum diatur.' }} --}}
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if (optional($item->prodi)->level)
                                                    {{ optional($item->prodi)->level . ' ' . ucwords(optional($item->prodi)->name_prodi) }}
                                                @else
                                                    <i class="text-secondary">Program Studi belum diatur.</i>
                                                @endif
                                                {{-- {{ optional($item->prodi)->level ? optional($item->prodi)->level . ' ' . ucwords(optional($item->prodi)->name_prodi) : 'Program Studi belum diatur.' }} --}}
                                            </td>
                                            <td style="vertical-align: middle;" align="center">
                                                <button class="btn btn-danger btn-round"
                                                    onclick="confirmDeleteAccess({{ $item->id }})">Hapus
                                                    Akses</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="8" style="vertical-align: middle; text-align: center">
                                                <i class="text-secondary">Data Pengguna dengan izin akses kosong.</i>
                                            </th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if ($userisAccessBySuperadmin->isEmpty())
                                {{ null }}
                            @else
                                <div class="d-flex justify-content-end pt-2">
                                    {{ $userisAccessBySuperadmin->links() }}
                                </div>
                            @endif

                            <form id="edit-access" action="" method="POST" style="display: none;">
                                @csrf
                                @method('PUT')
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @elseif (Auth::user()->role === 'admin')
            @if (!$userisAccess->isEmpty())
                <div class="card">
                    <div class="card-header pb-0">
                        <h3 class="mt-4 ml-2 pb-2" style="font-weight: 700">Status Akses Pengguna : Diizinkan</h3>
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
                                        <th style="text-align: center">Gender</th>
                                        <th>Program Studi</th>
                                        <th style="text-align: center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($userisAccess as $key=>$item)
                                        <tr>
                                            <th style="vertical-align: middle; text-align: center" scope="row">
                                                {{ $key + 1 }}</th>
                                            <td align="center">
                                                @if ($item->photo === null)
                                                    <img src="{{ asset('images/profile_img/default-image.jpg') }}"
                                                        alt=""
                                                        style="width: 50px; height: 50px; object-fit: cover;"
                                                        class="img-fluid img-circle">
                                                @elseif ($item->photo !== null && !file_exists($item->photo))
                                                    <img src="{{ asset('images/profile_img/default-image.jpg') }}"
                                                        alt=""
                                                        style="width: 50px; height: 50px; object-fit: cover;"
                                                        class="img-fluid img-circle">
                                                @else
                                                    <img src="{{ asset($item->photo) }}" alt="{{ $item->name }}"
                                                        style="width: 50px; height: 50px; object-fit: cover;"
                                                        class="img-fluid img-circle">
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">{{ ucwords($item->name) }}</td>
                                            <td style="vertical-align: middle;">{{ $item->email }}</td>
                                            <td style="vertical-align: middle;" align="center">
                                                @if ($item->gender === '0')
                                                    <i class="bi bi-gender-male" style="color: palevioletred"></i> - P
                                                @endif
                                                @if ($item->gender === '1')
                                                    <i class="bi bi-gender-female" style="color: blue"></i> - L
                                                @endif
                                                @if ($item->gender === '2')
                                                    <i class="bi bi-gender-neuter" style="color: gray"></i> - N/A
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if (optional($item->prodi)->level)
                                                    {{ optional($item->prodi)->level . ' ' . ucwords(optional($item->prodi)->name_prodi) }}
                                                @else
                                                    <i class="text-secondary">Program Studi belum diatur.</i>
                                                @endif
                                                {{-- {{ optional($item->prodi)->level ? optional($item->prodi)->level . ' ' . ucwords(optional($item->prodi)->name_prodi) : 'Program Studi belum diatur.' }} --}}
                                            </td>
                                            <td style="vertical-align: middle;" align="center">
                                                <button class="btn btn-danger btn-round"
                                                    onclick="confirmDeleteAccess({{ $item->id }})">Hapus
                                                    Akses</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="7" style="vertical-align: middle; text-align: center">
                                                <i class="text-secondary">Data Pengguna dengan izin akses kosong.</i>
                                            </th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if ($userisAccess->isEmpty())
                                {{ null }}
                            @else
                                <div class="d-flex justify-content-end pt-2">
                                    {{ $userisAccess->links() }}
                                </div>
                            @endif

                            <form id="edit-access" action="" method="POST" style="display: none;">
                                @csrf
                                @method('PUT')
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>
    {{-- Page-body end --}}

    {{-- Modal Start --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Form Edit Data Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="editForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group row mb-0">
                            <label class="col-sm-12 col-form-label">Nama Lengkap / Email <span
                                    class="text-danger">*</span></label>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 d-flex align-items-center" style="gap: .5rem;">
                                <input type="text" id="edit-name" name="name" class="form-control"
                                    placeholder="Contoh: Monica Gribson Bill" autofocus>

                                <input type="email" id="edit-email" name="email" class="form-control"
                                    placeholder="Contoh: contoh@gmail.com">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-round" data-bs-dismiss="modal">Tutup</button>
                        <button name="save" class="btn btn-success btn-round" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal End --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editModal = document.getElementById('editModal')
            const editForm = document.getElementById('editForm')
            const editName = document.getElementById('edit-name')
            const editEmail = document.getElementById('edit-email')

            // Event listener untuk semua tombol "Edit"
            document.querySelectorAll('.btn-edit').forEach(button => {
                button.addEventListener('click', function() {
                    // Ambil data dari atribut tombol
                    const userId = this.getAttribute('data-id')
                    const userName = this.getAttribute('data-name')
                    const userEmail = this.getAttribute('data-email')

                    // Set nilai form
                    editForm.action = `/!4dm1n/user/${userId}`
                    editName.value = userName
                    editEmail.value = userEmail
                })
            });
        })

        function confirmDeleteAccess(id) {
            Swal.fire({
                title: 'Hapus akses pengguna?',
                text: "Akses pengguna akan dihilangkan.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, tentu!',
                cancelButtonText: 'Tidak, Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Ubah action form edit sesuai dengan ID user
                    const form = document.getElementById('edit-access');
                    form.action = `/!4dm1n/user_access/${id}`;
                    form.submit();
                }
            });
        }
    </script>
@endsection
