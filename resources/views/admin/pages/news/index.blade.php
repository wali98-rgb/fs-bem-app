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
          @forelse ($news as $n)
          @php
          $fileURL = "files/news/" . $n->file_berita
          @endphp
          <div class="col-md-4">
            <div class="card">
              <div class="card-body text-center">
                <h6 class="card-title text-truncate mb-2 text-bold" title="{{ $n->nama }}">
                  {{ $n->nama }}
                </h6>
                <iframe src="{{ asset($fileURL) }}" width="100%" height="200" frameborder="0" allowfullscreen></iframe>
                <a href="javascript:void(0)" onclick="showFile('{{ asset($fileURL) }}')" class="btn btn-sm btn-info mt-2">
                  Lihat
                </a>
                <div class="mt-2">
                  <a href="{{ asset($fileURL) }}" class="btn btn-sm btn-success" download>
                    Unduh
                  </a>
                  <a href="{{ route('news.edit', $n->id) }}" class="btn btn-sm btn-warning">
                    Edit
                  </a>
                  <form action="{{ route('news.delete', $n->id) }}" method="POST"
                    class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Berita Acara ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                      Hapus
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @empty
          @endforelse
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
          <iframe src="${url}" frameborder="0" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
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