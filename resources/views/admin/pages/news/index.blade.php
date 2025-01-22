@extends('admin.layouts.master')

@section("content")
<div class="page-header card">
  <div class="row align-items-end">
    <div class="col-lg-8">
      <div class="page-header-title">
        <i class="bi bi-journals bg-c-blue"></i>
        <div class="d-inline">
          <h4>Berita Acara BEM Indonesia Mandiri</h4>
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
          <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Berita Acara</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="page-body">
  <div class="card">
    <div class="card-header">
      <a href="{{ route('news.create') }}" class="btn btn-primary btn-round">Tambah</a>
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
              <th>Tanggal Dilaksanakan</th>
              <th>Status</th>
              <th>File</th>
              <th>Nama Acara</th>
              <th>Deskripsi</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($news as $n)
            <tr>
              <th style="text-align: center" scope="row">{{ $loop->iteration }}</th>
              <td>{{ $n->tanggal }}</td>
              <td>
                @switch($n->status)
                @case('open')
                <span></span>
                @break
                @case('pending')
                <span></span>
                @break
                @case('done')
                <span></span>
                @break
                @default
                <span></span>
                @endswitch
              </td>
              <td>{{ $n->file_berita }}</td>
              <td>{{ $n->nama }}</td>
              <td>{{ $n->deskripsi }}</td>
              <td align="center">
                <a href="{{ route('news.edit', $n->id) }}" class="btn btn-warning btn-round">Edit</a>
                <a href="{{ route('news.delete', $n->id) }}" class="btn btn-danger btn-round" data-confirm-delete="true">Hapus</a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7" style="text-align: center"><i>Data Berita Acara tidak tersedia.</i></td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection