@extends('admin.layouts.master')

@section('content')
    {{-- Page-header start --}}
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="bi bi-activity bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Program Kerja Departemen</h4>
                        <span>Program Kerja yang dilakukan oleh setiap departemen kabinet periode 2023/2024.</span>
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
                        <li class="breadcrumb-item"><a href="{{ route('proker.index') }}">Program Kerja</a>
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
                <a href="{{ route('proker.index') }}" class="btn btn-danger btn-round">Kembali ke list Program Kerja</a>
            </div>

            <div class="card-block">
                <form method="POST" action="{{ route('proker.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Departemen Kabinet</label>
                        <div class="col-sm-10">
                            <select name="dept_id" class="form-control">
                                <option disabled value="" selected>-- Pilih Departemen --</option>
                                @forelse ($depts as $item)
                                    <option value="{{ $item->id }}">Kabinet {{ $item->name_dpt }}
                                    </option>
                                @empty
                                    <option value="" disabled>Tambahkan Departemen terlebih dahulu.</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Program Kerja</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ old('proker') }}" name="proker" class="form-control"
                                placeholder="Contoh: OPTIMASI" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Deskripsi Proker</label>
                        <div class="col-sm-10">
                            <textarea name="desc_proker" rows="5" cols="5" class="form-control"
                                placeholder="Contoh: OPTIMASI merupakan kegiatan...">{{ old('desc_proker') }}</textarea>
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
