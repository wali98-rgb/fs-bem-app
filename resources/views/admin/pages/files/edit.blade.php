@extends('admin.layouts.master')

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="bi bi-file-earmark bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Edit Berkas</h4>
                        <span>Formulir pengubahan berkas program kerja departemen.</span>
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
                        <li class="breadcrumb-item"><a href="{{ route('files.index', $proker->id) }}">Daftar Berkas</a></li>
                        <li class="breadcrumb-item">Edit Berkas</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('files.index', $proker->id) }}" class="btn btn-danger btn-round">Kembali ke Daftar Berkas</a>
            </div>

            <div class="card-block">
                <form method="POST" action="{{ route('files.update', [$proker->id, $file->id_berkas]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Berkas</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_berkas" class="form-control" 
                                value="{{ old('nama_berkas', $file->nama_berkas) }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tipe Berkas</label>
                        <div class="col-sm-10">
                            <select name="tipe_berkas" class="form-control" required>
                                <option value="" disabled>-- Pilih Tipe Berkas --</option>
                                <option value="0" {{ old('tipe_berkas', $file->tipe_berkas) == '0' ? 'selected' : '' }}>Proposal</option>
                                <option value="1" {{ old('tipe_berkas', $file->tipe_berkas) == '1' ? 'selected' : '' }}>LPJ</option>
                                <option value="2" {{ old('tipe_berkas', $file->tipe_berkas) == '2' ? 'selected' : '' }}>Dokumentasi</option>
                                <option value="3" {{ old('tipe_berkas', $file->tipe_berkas) == '3' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Acara</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal_acara" class="form-control" 
                                value="{{ old('tanggal_acara', $file->tanggal_acara) }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Berkas Saat Ini</label>
                        <div class="col-sm-10">
                            <p>{{ basename($file->file_berkas) }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Upload Berkas Baru</label>
                        <div class="col-sm-10">
                            <input type="file" name="file_berkas" class="form-control">
                            <small class="text-muted">Format yang diizinkan: PDF, DOC, DOCX. Maksimal ukuran: 2MB. Biarkan kosong jika tidak ingin mengubah berkas.</small>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success btn-round mr-2" type="submit">Perbarui</button>
                        <button type="reset" class="btn btn-warning btn-round">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection