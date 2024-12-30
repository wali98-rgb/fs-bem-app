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
            <div class="card-header">
                <a href="{{ route('user.index') }}" class="btn btn-danger btn-round">Kembali ke List Akun Pengguna</a>
            </div>

            <div class="card-block">
                <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Foto Profil</label>
                        <div class="col-sm-10">
                            <input type="file" value="{{ old('photo') }}" name="photo" class="form-control"
                                placeholder="Pilih Foto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                                placeholder="Contoh: Monica Gribson Bill" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                                placeholder="Contoh: contoh@gmail.com" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" value="{{ old('password') }}" name="password" class="form-control"
                                placeholder="Minimal 8 karakter" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10 d-flex">
                            <div class="d-flex align-items-center mr-3">
                                <input type="radio" name="gender" id="0" class="" value="0">
                                <label for="0" class="mb-0 ml-1">Perempuan</label>
                            </div>

                            <div class="d-flex align-items-center mr-3">
                                <input type="radio" name="gender" id="1" class="" value="1">
                                <label for="1" class="mb-0 ml-1">Laki-laki</label>
                            </div>

                            <div class="d-flex align-items-center mr-3">
                                <input type="radio" name="gender" id="2" class="" value="2">
                                <label for="2" class="mb-0 ml-1">Tidak
                                    ingin memberitahu</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Departemen Kabinet</label>
                        <div class="col-sm-10">
                            <select name="dept_id" class="form-control">
                                <option disabled value="" selected>-- Pilih Departemen --</option>
                                @forelse ($depts as $item)
                                    <option value="{{ $item->id }}">Kabinet {{ $item->name_dpt }}
                                    </option>
                                @empty
                                    <option value="" disabled>Tambahkan Departemen terlebih dahulu.</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Program Studi</label>
                        <div class="col-sm-10">
                            <select name="prodi_id" class="form-control">
                                <option disabled value="" selected>-- Pilih Prodi --</option>
                                @forelse ($prodis as $item)
                                    <option value="{{ $item->id }}">{{ $item->level }} {{ $item->name_prodi }}
                                    </option>
                                @empty
                                    <option value="" disabled>Tambahkan Departemen terlebih dahulu.</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select name="role" class="form-control">
                                <option disabled value="" selected>-- Pilih Role Pengguna --</option>
                                <option value="bem">Anggota BEM</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button name="save" class="btn btn-success btn-round mr-2" type="submit">Simpan</button>
                        <button type="reset" class="btn btn-warning btn-round">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Page-body end --}}
@endsection
