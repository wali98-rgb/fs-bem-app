@extends('admin.layouts.master')

@section('content')
    {{-- Page-header start --}}
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="bi bi-easel bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>List Program Studi</h4>
                        <span>Program studi kampus Perguruan Tinggi Indonesia Mandiri Bandung.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i class="bi bi-columns-gap"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Halaman Utama</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('major.index') }}">Program Studi</a>
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
                <a href="{{ route('major.index') }}" class="btn btn-danger btn-round">Kembali ke list Program Studi</a>
            </div>
            <div class="card-block">
                <form method="POST" action="{{ route('major.update', $prodi->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Program Studi</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ $prodi->name_prodi }}" name="name_prodi" class="form-control"
                                placeholder="Contoh: Teknik Informatika" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tingkat Prodi</label>
                        <div class="col-sm-10">
                            <select name="level" class="form-control">
                                <option disabled selected>-- Pilih Tingkatan --</option>
                                @if ($prodi === $prodi)
                                    <option selected value="{{ $prodi->level }}">{{ $prodi->level }}</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                @else
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button name="save" class="btn btn-primary btn-round mr-2" type="submit">Edit</button>
                        <button type="reset" class="btn btn-warning btn-round">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Page-body end --}}
@endsection
