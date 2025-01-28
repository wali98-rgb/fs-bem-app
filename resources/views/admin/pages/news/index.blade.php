@extends('admin.layouts.master')

@section("content")
<div class="page-header card">
  <div class="row align-items-end">
    <div class="col-lg-8">
      <div class="page-header-title">
        <i class="bi bi-journals bg-c-blue"></i>
        <div class="d-inline">
          <h4>Berita Acara</h4>
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
    <div class="card-block">
      <div class="container">
        <div class="row">
          <table class="table">
            <thead>
              <tr>
                <th style="text-align: center">#</th>
                <th>Tanggal Dilaksanakan</th>
                <th>Status</th>
                <th>Nama Acara</th>
                <th>Deskripsi</th>
                <th style="text-align: center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($news as $n)
              @php
              $fileURL = 'files/news/' . $n->file_berita;
              @endphp
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
                <td>{{ $n->nama }}</td>
                <td>{{ $n->deskripsi }}</td>
                <td align="center">
                  <a href="javascript:void(0)" onclick="showFile('{{ asset($fileURL) }}')">Lihat</a>
                  <a href="{{ asset($fileURL) }}" class="btn btn-warning btn-round" download>Download</a>
                  <a href="{{ route('news.edit', $n->id) }}" class="btn btn-warning btn-round">Edit</a>
                  <form action="{{ route('news.delete', $n->id) }}" method="POST"
                    class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Berita Acara ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                      Hapus
                    </button>
                  </form>
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
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function showFile(url) {
    Swal.fire({
      html: `
        <div style="position: relative; padding-top: 56.25%; overflow: hidden;">
          <object data="${url}" type="application/pdf" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
            <embed src="${url}" type="application/pdf" />
            <!-- Fallback jika browser tidak mendukung -->
            <p>Browser Anda tidak mendukung menampilkan PDF.</p>
          </object>
        </div>
      `,
      width: '90%',
      showCloseButton: true,
      showConfirmButton: false,
      customClass: {
        popup: 'swal-wide'
      }
    });
  }
</script>
@endsection