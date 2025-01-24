@extends('admin.layouts.master')

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="bi bi-journals bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Daftar Arsip</h4>
                        <span>Halaman untuk melihat dan mengelola arsip dalam tampilan grid.</span>
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
                        <li class="breadcrumb-item"><a href="#">Konten</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="card">
            <div class="card-header">
                <h5>Daftar Arsip</h5>
                <a href="{{ route('archive.create') }}" class="btn btn-primary btn-round float-right">
                    Tambah Arsip
                </a>
            </div>
            <div class="card-block">
                {{-- Grid Layout untuk Arsip --}}
                <div class="container">
                    <div class="row">
                        @foreach ($archives as $archive)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h6 class="card-title text-truncate mb-2 text-bold" title="{{ $archive->title }}">
                                            {{ $archive->title }}
                                        </h6>
                                        <iframe src="{{ asset($archive->file) }}" width="100%" height="200" frameborder="0" allowfullscreen></iframe>
                                            <a href="javascript:void(0)" onclick="showFile('{{ asset($archive->file) }}')" class="btn btn-sm btn-info mt-2">
                                                <i class="bi bi-arrows-fullscreen"></i>Lihat
                                            </a>
                                        <div class="mt-2">
                                            <a href="{{ asset($archive->file) }}" class="btn btn-sm btn-success" download>
                                                <i class="bi bi-download"></i> Unduh
                                            </a>
                                            <a href="{{ route('archive.edit', $archive->id) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <form action="{{ route('archive.destroy', $archive->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus arsip ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Page-body end --}}
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
         function showFile(fileUrl) {
        Swal.fire({
            html: `
                <div style="position: relative; padding-top: 56.25%; overflow: hidden;">
                    <iframe src="${fileUrl}" frameborder="0" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
                </div>
            `,
            width: '90%',
            showCloseButton: true,
            showConfirmButton: false,
            customClass: {
                popup: 'swal-wide'
            }
        });
        }
    </script>
@endsection

