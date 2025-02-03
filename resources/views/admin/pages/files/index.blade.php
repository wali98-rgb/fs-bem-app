@extends('admin.layouts.master')

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="bi bi-file-earmark bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Berkas Kegiatan {{ $proker->proker }}</h4>
                        <span>Daftar berkas dan persuratan program kerja {{ $proker->proker }}.</span>
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
                        <li class="breadcrumb-item"><a href="{{ route('files.showProker') }}">Program Kerja</a></li>
                        <li class="breadcrumb-item"><a href="#">Berkas</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="card">
            <div class="card-header">
                <h4>Berkas Kegiatan {{ $proker->proker }}</h4>
                <a href="{{ route('files.create', ['proker' => $proker->id]) }}" class="btn btn-primary btn-round float-right">
                    Tambah Berkas
                </a>
            </div>
            <div class="card-block">
                <div class="container">
                    <div class="row">
                        @foreach ($files as $file)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h6 class="card-title text-truncate mb-2 text-bold" title="{{ $file->nama_berkas }}">
                                            {{ $file->nama_berkas }}
                                        </h6>
                                        <p class="text-muted">
                                            Tanggal: {{ \Carbon\Carbon::parse($file->tanggal_acara)->format('d/m/Y') }}
                                        </p>
                                        <iframe src="{{ asset($file->file_berkas) }}" frameborder="0"></iframe>
                                        <div class="d-flex justify-content-center gap-2 mt-2">
                                            <a href="javascript:void(0)" onclick="showFile('{{ Storage::url($file->file_berkas) }}')" class="btn btn-info btn-sm">
                                                <i class="bi bi-arrows-fullscreen"></i> Lihat
                                            </a>
                                            <a href="{{ Storage::url($file->file_berkas) }}" class="btn btn-success btn-sm" download>
                                                <i class="bi bi-download"></i> Unduh
                                            </a>
                                            <a href="{{ route('files.edit', [$proker->id, $file->id_berkas]) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <form action="{{ route('files.destroy', [$proker->id, $file->id_berkas]) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berkas ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
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
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showFile(fileUrl) {
            Swal.fire({
                html: `
                    <div style="position: relative; padding-top: 56.25%; overflow: hidden;">
                        <iframe src="${fileUrl}"frameborder="0" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
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

@section('styles')
<style>
    .swal-wide {
        width: 850px !important;
    }
    .swal2-popup {
        padding: 0 !important;
    }
    .swal2-content {
        padding: 0 !important;
    }
    .d-flex.gap-2 > * {
        margin-left: 25px;
    }
</style>
@endsection
