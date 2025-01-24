@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Daftar Sertifikat</h3>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti-plus"></i> Tambah
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('certificate.store') }}" class="dropdown-item">
                        <i class="ti-id-badge"></i> Sertifikat Manual
                    </a>
                    <a href="{{ route('certificate.upload') }}" class="dropdown-item" data-toggle="modal" data-target="#uploadTemplateModal">
                        <i class="ti-upload"></i> Upload Template
                    </a>
                    <a href="{{ route('certificate.generate.bulk')}}" class="dropdown-item" data-toggle="modal" data-target="#generateCertificatesModal">
                        <i class="ti-layers-alt"></i> Generate Sertifikat Masal
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Nama Kegiatan</th>
                            <th>Tema Kegiatan</th>
                            <th>Template</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($certificates as $certificate)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $certificate->nama }}</td>
                            <td>{{ $certificate->kategori_sebagai }}</td>
                            <td>{{ $certificate->nama_kegiatan }}</td>
                            <td>{{ $certificate->tema_kegiatan }}</td>
                            <td>{{ $certificate->template->nama }}</td>
                            <td>
                                <a href="{{ asset($certificate->file_path) }}" class="btn btn-success btn-sm" target="_blank">
                                    <i class="ti-download"></i>
                                </a>
                                <a href="{{ route('certificate.destroy', $certificate->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">
                                    <i class="ti-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Template Upload Modal -->
<div class="modal fade" id="uploadTemplateModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('certificate.template.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Upload Template Sertifikat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Template</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="file_template">File Template PDF</label>
                        <input type="file" id="file_template" name="file_template" class="form-control" accept=".pdf" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Generate Certificates Modal -->
<div class="modal fade" id="generateCertificatesModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('certificate.generate.bulk') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Generate Sertifikat Masal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="template_id">Pilih Template</label>
                        <select id="template_id" name="template_id" class="form-control" required>
                            @foreach($templates as $template)
                                <option value="{{ $template->id }}">{{ $template->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="peserta_file">File Excel Data Peserta</label>
                        <input type="file" id="peserta_file" name="peserta_file" class="form-control" accept=".xlsx,.xls" required>
                    </div>
                    <small class="text-muted">Format Excel: No, Nama, Kategori, Nama Kegiatan, Tema Kegiatan</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Generate</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
