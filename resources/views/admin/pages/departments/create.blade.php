@extends('admin.layouts.master')

@section('content')
    {{-- Page-header start --}}
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="bi bi-journals bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Departemen Kabinet BEM Indonesia Mandiri</h4>
                        <span>Daftar departemen yang terdapat dalam BEM Indonesia Mandiri Bandung.</span>
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
                        <li class="breadcrumb-item"><a href="{{ route('department.index') }}">Departemen</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

    {{-- Page-body start --}}
    <div class="page-bod">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('department.index') }}" class="btn btn-danger btn-round">Kembali ke list Departemen
                    Kabinet</a>
            </div>
            <div class="card-block">
                <form method="POST" action="{{ route('department.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Departemen Kabinet</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ old('name_dpt') }}" name="name_dpt" class="form-control"
                                placeholder="Contoh: Kominfo" autofocus>
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
