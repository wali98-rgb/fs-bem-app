@extends('admin.layouts.master')


@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Buat Sertifikat Baru</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('certificate.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nomor Sertifikat</label>
                            <input type="text" name="no_certi" class="form-control @error('no_certi') is-invalid @enderror" value="{{ old('no_certi') }}">
                            @error('no_certi')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Peserta</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                            @error('nama')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kategori Sebagai</label>
                            <input type="text" name="kategori_sebagai" class="form-control @error('kategori_sebagai') is-invalid @enderror" value="{{ old('kategori_sebagai') }}">
                            @error('kategori_sebagai')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Kegiatan</label>
                            <input type="text" name="nama_kegiatan" class="form-control @error('nama_kegiatan') is-invalid @enderror" value="{{ old('nama_kegiatan') }}">
                            @error('nama_kegiatan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Tema Kegiatan</label>
                    <input type="text" name="tema_kegiatan" class="form-control @error('tema_kegiatan') is-invalid @enderror" value="{{ old('tema_kegiatan') }}">
                    @error('tema_kegiatan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Template Sertifikat</label>
                    <select name="template_id" class="form-control @error('template_id') is-invalid @enderror">
                        <option value="">Pilih Template</option>
                        @foreach($templates as $template)
                            <option value="{{ $template->id }}">{{ $template->nama }}</option>
                        @endforeach
                    </select>
                    @error('template_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="ti-save"></i> Simpan Sertifikat
                    </button>
                    <a href="{{ route('certificate.index') }}" class="btn btn-secondary">
                        <i class="ti-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Optional: Add any client-side validation or additional scripts
    });
</script>
@endpush
