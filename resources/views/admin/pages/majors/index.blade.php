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
                <a href="{{ route('major.create') }}" class="btn btn-primary btn-round">Tambah Program Studi</a>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="icofont icofont-simple-left "></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive p-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="text-align: center">#</th>
                                <th>Program Studi</th>
                                <th>Tingakatan</th>
                                <th style="text-align: center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($prodi as $key=>$item)
                                <tr>
                                    <th style="text-align: center" scope="row">{{ $key + 1 }}</th>
                                    <td>{{ ucwords($item->name_prodi) }}</td>
                                    <td>{{ $item->level }}</td>
                                    <td align="center">
                                        <a href="{{ route('major.edit', $item->id) }}"
                                            class="btn btn-warning btn-round">Edit</a>
                                        <a href="{{ route('major.destroy', $item->id) }}" class="btn btn-danger btn-round"
                                            data-confirm-delete="true">HAPUS</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="4" style="text-align: center"><i>Data Program studi belum
                                            diperbaharui.</i>
                                    </th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Page-body end --}}
@endsection
