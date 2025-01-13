@extends('admin.layouts.master')

@section('content')
    {{-- Page-header start --}}
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="bi bi-journals bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Tambah Konten</h4>
                        <span>Halaman untuk menambahkan konten baru.</span>
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
                        <li class="breadcrumb-item"><a href="{{ route('content.index') }}">Konten</a></li>
                        <li class="breadcrumb-item"><a href="#">Tambah Konten</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- Page-header end --}}

    {{-- Page-body start --}}
    <div class="page-body">
        <div class="card">
            <div class="card-header">
                <h5>Form Tambah Konten</h5>
            </div>
            <div class="card-block">
                {{-- Tambahkan enctype untuk form --}}
                <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
                        @error('date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <input type="text" name="description" id="description" class="form-control"
                               value="{{ old('description') }}" required>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">File Konten</label>
                        <input type="file" name="content" id="content" class="form-control">
                        <small class="text-muted">Format yang didukung: jpeg, png, jpg, mp4, txt. Max 20 MB.</small>
                        @error('content')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="media_url">URL Media (Opsional)</label>
                        <input type="text" name="media_url" id="media_url" class="form-control"
                               value="{{ old('media_url') }}">
                        @error('media_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="media_type">Tipe Media</label>
                        <select name="media_type" id="media_type" class="form-control">
                            <option value="">Pilih Tipe Media</option>
                            <option value="image" {{ old('media_type') == 'image' ? 'selected' : '' }}>Image</option>
                            <option value="video" {{ old('media_type') == 'video' ? 'selected' : '' }}>Video</option>
                            <option value="text" {{ old('media_type') == 'text' ? 'selected' : '' }}>Text</option>
                        </select>
                        @error('media_type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approve" {{ old('status') == 'approve' ? 'selected' : '' }}>Approve</option>
                            <option value="refuse" {{ old('status') == 'refuse' ? 'selected' : '' }}>Refuse</option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success btn-round">Simpan Konten</button>
                        <a href="{{ route('content.index') }}" class="btn btn-secondary btn-round">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Page-body end --}}
@endsection
