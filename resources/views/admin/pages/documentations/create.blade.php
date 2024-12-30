@extends('admin.layouts.master')

@section('content')
    {{-- Page-header start --}}
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="bi bi-images bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Dokumentasi Kegiatan</h4>
                        <span>Dokumentasi dari program kerja tiap departemen kabinet BEM Indonesia Mandiri.</span>
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
                        <li class="breadcrumb-item"><a href="{{ route('docum.index') }}">Dokumentasi</a>
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
                <a href="{{ route('docum.index') }}" class="btn btn-danger btn-round">Kembali ke tampilan dokumentasi
                    kegiatan</a>
            </div>

            <div class="card-block">
                <form method="POST" action="{{ route('docum.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Program Kerja</label>
                        <div class="col-sm-10">
                            <select name="proker_id" class="form-control">
                                <option disabled value="" selected>-- Pilih Proker --</option>
                                @forelse ($prokers as $item)
                                    <option value="{{ $item->id }}">{{ $item->proker }}
                                    </option>
                                @empty
                                    <option value="" disabled>Tambahkan progker terlebih dahulu.</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Dokumentasi</label>
                        <div class="col-sm-10">
                            <input type="file" value="{{ old('docums') }}" name="docums[]" class="form-control"
                                placeholder="Pilih dokumentasi" multiple autofocus>
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
