@extends('admin.layouts.master')

@section('css_plus')
    <style>
        /* Animasi fade-in */
        .fade {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        /* Aktifkan animasi */
        .fade.show {
            opacity: 1;
        }
    </style>
@endsection

@section('content')
    {{-- Page-header start --}}
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="bi bi-people bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Tambah Data Pengguna</h4>
                        <span>Menambah akun pengguna baru.</span>
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
                    @if (Auth::user()->role === 'bem')
                        <div class="form-group text-center" id="file-preview">
                            <p class="label label-inverse-info"><i>Preview profil akan muncul disini</i></p>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Foto Profil</label>
                            <div class="col-sm-9 d-flex align-items-start" style="gap: .5rem">
                                <div class="w-100">
                                    <input type="file" id="file" accept="image/*,application/pdf"
                                        value="{{ old('photo') }}" name="photo" class="form-control"
                                        onchange="previewFile()" placeholder="Pilih Foto">

                                    <span class="border-0 text-info text-wrap d-flex align-items-center gap-1">
                                        <i><i class="bi bi-info-circle"></i> Silahkan masukkan profil.</i>
                                    </span>
                                </div>
                                <button type="button" id="cancel-profile" class="btn btn-danger d-none">Batal</button>
                            </div>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Lengkap / Email <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-9 d-flex align-items-center" style="gap: .5rem;">
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                                placeholder="Contoh: Monica Gribson Bill" autofocus>

                            <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                                placeholder="Contoh: contoh@gmail.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Password <span class="text-danger">*</span></label>
                        <div class="col-sm-9 d-flex align-items-start">
                            <div class="w-100">
                                <input type="password" id="password" value="{{ old('password') }}" name="password"
                                    class="form-control" placeholder="Minimal 8 karakter">
                                <span class="border-0 text-danger text-wrap" id="span-password">
                                    <i>Copy dan simpan password sebelum menambahkan data.</i>
                                </span>
                            </div>

                            {{-- Tombol untuk mengaktifkan atau generate password --}}
                            <button id="toggle-btn" type="button" class="btn btn-primary ml-2">Generate
                                Password</button>
                            <button id="cancel-btn" type="button" class="btn btn-danger ml-2 d-none">Batal</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Gender <span class="text-danger">*</span></label>
                        <div class="col-sm-9 d-flex justify-content-center" style="gap: 1.5rem">
                            <div class="d-flex align-items-center">
                                <input type="radio" name="gender" id="0" class="" value="0">
                                <label for="0" class="mb-0 ml-1">
                                    <i class="bi bi-gender-male" style="color: palevioletred"></i> Perempuan
                                </label>
                            </div>

                            <div class="d-flex align-items-center">
                                <input type="radio" name="gender" id="1" class="" value="1">
                                <label for="1" class="mb-0 ml-1">
                                    <i class="bi bi-gender-female" style="color: blue"></i> Laki-laki
                                </label>
                            </div>

                            <div class="d-flex align-items-center">
                                <input type="radio" name="gender" id="2" class="" value="2">
                                <label for="2" class="mb-0 ml-1">
                                    <i class="bi bi-gender-neuter" style="color: gray"></i> Tidak ingin memberitahu
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            @if (Auth::user()->role === 'superadmin')
                                Departemen Kabinet /
                                @endif Program Studi @if (Auth::user()->role === 'superadmin')
                                    / Kategori Pengguna
                                @endif
                                <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9 d-flex justify-content-center" style="gap: .5rem">
                            @if (Auth::user()->role === 'superadmin')
                                <select name="dept_id" class="form-control">
                                    <option disabled value="" selected>-- Pilih Departemen --</option>
                                    @forelse ($depts as $item)
                                        <option value="{{ $item->id }}">Departemen {{ $item->name_dpt }}
                                        </option>
                                    @empty
                                        <option value="" disabled>Tambahkan Departemen terlebih dahulu.</option>
                                    @endforelse
                                </select>
                            @endif

                            <select name="prodi_id" class="form-control">
                                <option disabled value="" selected>-- Pilih Prodi --</option>
                                @forelse ($prodis as $item)
                                    <option value="{{ $item->id }}">{{ $item->level }} {{ $item->name_prodi }}
                                    </option>
                                @empty
                                    <option value="" disabled>Tambahkan Departemen terlebih dahulu.</option>
                                @endforelse
                            </select>

                            @if (Auth::user()->role === 'superadmin')
                                <select name="role" class="form-control">
                                    <option disabled value="" selected>-- Pilih Role Pengguna --</option>
                                    <option value="bem">Anggota BEM</option>
                                    <option value="admin">Admin</option>
                                </select>
                            @endif
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

    <script>
        function previewFile() {
            const fileInput = document.getElementById('file')
            const previewContainer = document.getElementById('file-preview')
            const file = fileInput.files[0]

            if (file) {
                const fileType = file.type
                $('#cancel-profile').removeClass('d-none')

                // Kosongkan preview sebelumnya
                previewContainer.innerHTML = ''

                if (fileType.startsWith('image/')) {
                    // Preview Gambar
                    const img = document.createElement('img')
                    img.src = URL.createObjectURL(file)
                    img.style.maxWidth = '100%'
                    img.style.maxHeight = '300px'
                    img.style.borderRadius = '.5rem'
                    img.style.boxShadow = '0 0 10px -2px black'
                    img.alt = 'Preview Profil'
                    img.classList.add('fade')
                    previewContainer.appendChild(img)

                    // Tambahkan kelas "show" setelah waktu singkat untuk memulai animasi
                    setTimeout(() => img.classList.add('show'), 10);
                } else if (fileType === 'application/pdf') {
                    // Preview PDF
                    const pdfMassage = document.createElement('p')
                    pdfMassage.textContent = 'File PDF siap diunggah.'
                    previewContainer.appendChild(pdfMassage)

                    // Tambahkan kelas "show" setelah waktu singkat untuk memulai animasi
                    setTimeout(() => pdfMassage.classList.add('show'), 10);
                } else {
                    // File format tidak didukung untuk preview
                    const unsupportMessage = document.createElement('p')
                    unsupportMessage.textContent = 'Format file tidak dapat dipreview.'
                    previewContainer.appendChild(unsupportMessage)

                    // Tambahkan kelas "show" setelah waktu singkat untuk memulai animasi
                    setTimeout(() => unsupportMessage.classList.add('show'), 10);
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password')
            const toggleBtn = document.getElementById('toggle-btn')
            const cancelBtn = document.getElementById('cancel-btn')

            const previewContainer = document.getElementById('file-preview')
            const photoInput = document.getElementById('file')
            const cancelProfile = document.getElementById('cancel-profile')

            let isEditing = true

            toggleBtn.addEventListener('click', function() {
                if (!isEditing) {
                    // Aktifkan input password dan ubah tombol menjadi "Generate Password"
                    passwordInput.type = 'text'
                    passwordInput.value = '' // Kosongkan password saat diaktifkan
                    $('#cancel-btn').removeClass('d-none')
                    isEditing = true
                } else {
                    // Generate password acak
                    passwordInput.type = 'text'
                    const generatedPassword = Array(8).fill(null).map(() => {
                        const chars =
                            'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@#$%&'
                        return chars.charAt(Math.floor(Math.random() * chars.length))
                    }).join('')

                    passwordInput.value = generatedPassword // Masukkan password acak ke input
                    $('#cancel-btn').removeClass('d-none')
                }
            })

            cancelBtn.addEventListener('click', function() {
                passwordInput.type = 'password'
                passwordInput.value = ''
                $('#cancel-btn').addClass('d-none')
            })

            cancelProfile.addEventListener('click', function() {
                $('#cancel-profile').addClass('d-none')
                photoInput.value = null
                previewContainer.innerHTML =
                    '<p class="label label-inverse-info"><i>Preview profil akan muncul disini</i></p>'
            })
        })
    </script>
@endsection
