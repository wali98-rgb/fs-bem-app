@extends('admin.layouts.master')

@section('content')
    {{-- Page-header start --}}
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="bi bi-people bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Edit Data Pengguna</h4>
                        <span>Memperbarui data akun pengguna.</span>
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
                <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Nama Lengkap / Email
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9 d-flex align-items-center" style="gap: .5rem;">
                            <input type="text" value="{{ $user->name }}" name="name" class="form-control"
                                placeholder="Contoh: Monica Gribson Bill" autofocus>

                            <input type="email" value="{{ $user->email }}" name="email" class="form-control"
                                placeholder="Contoh: contoh@gmail.com">
                        </div>
                    </div>

                    @if (Auth::user()->role === 'superadmin')
                        {{-- <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9 d-flex align-items-start">
                                <div class="w-100">
                                    <input type="password" id="password" value="{{ old('password') }}" name="password"
                                        class="form-control" placeholder="********" disabled>
                                    <span class="border-0 text-danger text-wrap" id="span-password">
                                        <i>Copy dan simpan password sebelum mengubah data.</i>
                                    </span>
                                </div>

                                {{-- Tombol untuk mengaktifkan atau generate password --}}
                        {{-- <button id="toggle-btn" type="button" class="btn btn-primary ml-2">Perbarui
                                    Password</button>
                                <button id="cancel-btn" type="button" class="btn btn-danger ml-2 d-none">Batal</button>
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9 d-flex justify-content-center" style="gap: 1.5rem">
                                <div class="d-flex align-items-center">
                                    @if ($user->gender === '0')
                                        <input type="radio" checked name="gender" id="0" class=""
                                            value="0">
                                        <label for="0" class="mb-0 ml-1">
                                            <i class="bi bi-gender-male" style="color: palevioletred"></i> Perempuan
                                        </label>
                                    @else
                                        <input type="radio" name="gender" id="0" class="" value="0">
                                        <label for="0" class="mb-0 ml-1">
                                            <i class="bi bi-gender-male" style="color: palevioletred"></i> Perempuan
                                        </label>
                                    @endif
                                </div>

                                <div class="d-flex align-items-center">
                                    @if ($user->gender === '1')
                                        <input type="radio" checked name="gender" id="1" class=""
                                            value="1">
                                        <label for="1" class="mb-0 ml-1">
                                            <i class="bi bi-gender-female" style="color: blue"></i> Laki-laki
                                        </label>
                                    @else
                                        <input type="radio" name="gender" id="1" class="" value="1">
                                        <label for="1" class="mb-0 ml-1">
                                            <i class="bi bi-gender-female" style="color: blue"></i> Laki-laki
                                        </label>
                                    @endif
                                </div>

                                <div class="d-flex align-items-center">
                                    @if ($user->gender === '2')
                                        <input type="radio" checked name="gender" id="2" class=""
                                            value="2">
                                        <label for="2" class="mb-0 ml-1">
                                            <i class="bi bi-gender-neuter" style="color: gray"></i> Tidak ingin
                                            memberitahu
                                        </label>
                                    @else
                                        <input type="radio" name="gender" id="2" class=""
                                            value="2">
                                        <label for="2" class="mb-0 ml-1">
                                            <i class="bi bi-gender-neuter" style="color: gray"></i> Tidak ingin
                                            memberitahu
                                        </label>
                                    @endif
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">
                                Departemen Kabinet / Program Studi / Kategori Pengguna
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9 d-flex justify-content-center" style="gap: .5rem">
                                <select name="dept_id" class="form-control">
                                    <option disabled value="" selected>-- Pilih Departemen --</option>
                                    @forelse ($depts as $item)
                                        @if ($user->dept_id === $item->id)
                                            <option selected value="{{ $item->id }}">Kabinet {{ $item->name_dpt }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id }}">Kabinet {{ $item->name_dpt }}
                                            </option>
                                        @endif
                                    @empty
                                        <option value="" disabled>Tambahkan Departemen terlebih dahulu.</option>
                                    @endforelse
                                </select>

                                <select name="prodi_id" class="form-control" disabled>
                                    <option disabled value="" selected>-- Pilih Prodi --</option>
                                    @forelse ($prodis as $item)
                                        @if ($user->prodi_id === $item->id)
                                            <option selected value="{{ $item->id }}">{{ $item->level }}
                                                {{ $item->name_prodi }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->level }}
                                                {{ $item->name_prodi }}
                                            </option>
                                        @endif
                                    @empty
                                        <option value="" disabled>Tambahkan Program Studi terlebih dahulu.</option>
                                    @endforelse
                                </select>

                                <select name="role" class="form-control">
                                    <option disabled value="" selected>-- Pilih Role Pengguna --</option>
                                    <option value="bem" {{ $user->role === 'bem' ? 'selected' : '' }}>Anggota BEM
                                    </option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="d-flex justify-content-end">
                        <button name="save" class="btn btn-success btn-round mr-2" type="submit">Simpan</button>
                        <button type="reset" class="btn btn-warning btn-round">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Page-body end --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password')
            const toggleBtn = document.getElementById('toggle-btn')
            const cancelBtn = document.getElementById('cancel-btn')

            let isEditing = false

            toggleBtn.addEventListener('click', function() {
                if (!isEditing) {
                    // Aktifkan input password dan ubah tombol menjadi "Generate Password"
                    passwordInput.disabled = false
                    passwordInput.type = 'text'
                    toggleBtn.textContent = 'Generate Password'
                    passwordInput.value = '' // Kosongkan password saat diaktifkan
                    passwordInput.placeholder = 'Minimal 8 karakter'
                    $('#cancel-btn').removeClass('d-none')
                    isEditing = true
                } else {
                    // Generate password acak
                    const generatedPassword = Array(8).fill(null).map(() => {
                        const chars =
                            'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@#$%&'
                        return chars.charAt(Math.floor(Math.random() * chars.length))
                    }).join('')

                    passwordInput.value = generatedPassword // Masukkan password acak ke input
                }
            })

            cancelBtn.addEventListener('click', function() {
                passwordInput.disabled = true
                passwordInput.type = 'password'
                toggleBtn.textContent = 'Perbarui Password'
                passwordInput.placeholder = '********'
                $('#cancel-btn').addClass('d-none')
                isEditing = false
            })
        })
    </script>
@endsection
