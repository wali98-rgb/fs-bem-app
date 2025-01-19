@extends('admin.layouts.master')

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="bi bi-pencil bg-c-yellow"></i>
                    <div class="d-inline">
                        <h4>Edit Arsip</h4>
                        <span>Form untuk mengedit arsip yang sudah ada.</span>
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
                        <li class="breadcrumb-item"><a href="{{ route('archive.index') }}">Arsip</a></li>
                        <li class="breadcrumb-item"><a href="#">Edit Arsip</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="card">
            <div class="card-header">
                <h5>Form Edit Arsip</h5>
                <div class="card-header-right">
                    <a href="{{ route('archive.index') }}" class="btn btn-secondary btn-round">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-block">
                <form action="{{ route('archives.update', $archive->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Judul Arsip</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                            placeholder="Masukkan judul arsip" value="{{ old('title', $archive->title) }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file">File Arsip</label>
                        <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror">
                        @if ($archive->file)
                            <div class="mt-2">
                                <p>File saat ini:</p>
                                <a href="{{ asset($archive->file) }}" target="_blank" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i> Lihat File
                                </a>
                            </div>
                        @endif
                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-round">
                            <i class="bi bi-check-circle"></i> Update Arsip
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
