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
                        <span>Program Kerja yang dilakukan oleh setiap departemen kabinet periode 2024/2025.</span>
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
                <a href="{{ route('proker.create') }}" class="btn btn-primary btn-round">Tambah Program Kerja</a>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="icofont icofont-simple-left "></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <!-- Row start -->
                <div class="sub-title">Program Kerja Departemen</div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs  tabs" role="tablist">
                    @forelse ($depts as $item)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('!4dm1n/proker#' . $item->name_dpt) ? 'active' : '' }}"
                                data-toggle="tab" href="#{{ $item->name_dpt }}" role="tab">{{ $item->name_dpt }}</a>
                        </li>
                    @empty
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#" role="tab"
                                @disabled(true)>Tambahkan Departemen Terlebih Dahulu.</a>
                        </li>
                    @endforelse
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabs card-block">
                    @forelse ($depts as $dept)
                        <div class="tab-pane {{ request()->is('!4dm1n/proker#' . $dept->name_dpt) ? 'active' : '' }}"
                            id="{{ $dept->name_dpt }}" role="tabpanel">
                            @foreach ($pro as $key => $item)
                                @if ($item->dept_id === $dept->id)
                                    <div class="row">
                                        <div class="col-9">
                                            <li class="m-0">
                                                {{ ucwords($item->proker) }}
                                            </li>
                                            <p class="ml-4">
                                                {{ \Illuminate\Support\Str::words($item->desc_proker, 40, '...') }}
                                            </p>
                                        </div>
                                        <div class="col-3">
                                            <div class="d-flex">
                                                <a href="{{ route('proker.edit', $item->id) }}"
                                                    class="btn btn-warning btn-round">EDIT</a>
                                                <a href="{{ route('proker.destroy', $item->id) }}"
                                                    class="btn btn-danger btn-round ml-1"
                                                    data-confirm-delete="true">HAPUS</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                            {{-- Kode untuk menampilkan info jika proker tidak tersedia --}}
                            {{-- @if ($item->dept_id !== $dept->id)
                                <p class="m-0">Program kerja belum ditambahkan.</p>
                            @endif --}}
                        </div>
                    @empty
                        <div class="tab-pane" id="" role="tabpanel">
                            <p class="m-0">
                                Departemen Kabinet belum ditambahkan.
                            </p>
                        </div>
                    @endforelse
                </div>
                <!-- Row end -->
            </div>
        </div>
    </div>
    {{-- Page-body end --}}
@endsection
