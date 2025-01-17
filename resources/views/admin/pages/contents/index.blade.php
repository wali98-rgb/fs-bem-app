@extends('admin.layouts.master')

@section('content')
    {{-- Page-header start --}}
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="bi bi-journals bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Daftar Konten</h4>
                        <span>Halaman untuk melihat dan mengelola konten.</span>
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
                        <li class="breadcrumb-item"><a href="#">Konten</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- Page-header end --}}

    {{-- Page-body start --}}
    <div class="page-body">
        <div class="card">
            <div class="card-header">
                <h5>Daftar Konten</h5>
                <a href="{{ route('content.create') }}" class="btn btn-primary btn-round float-right">
                    Tambah Konten
                </a>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Deskripsi</th>
                                <th>Konten</th>
                                <th>Tipe Media</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contents as $content)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $content->date }}</td>
                                    <td>{{ $content->description }}</td>
                                    <td>
                                        @if ($content->content && in_array($content->media_type, ['image']))
                                            <a href="#"
                                                onclick="showImage('{{ asset('storage/' . $content->content) }}')">
                                                <img src="{{ asset($content->content) }}" alt="Konten" width="100">
                                            </a>
                                        @elseif ($content->content && $content->media_type == 'video')
                                            <video width="200" controls>
                                                <source src="{{ asset('storage/' . $content->content) }}" type="video/mp4">
                                                Browser Anda tidak mendukung video tag.
                                            </video>
                                        @elseif ($content->content && $content->media_type == 'text')
                                            <a href="{{ asset('storage/' . $content->content) }}" target="_blank">Lihat
                                                File</a>
                                        @else
                                            <span class="text-muted">Tidak ada file</span>
                                        @endif
                                    </td>
                                    <td>{{ ucfirst($content->media_type ?? '-') }}</td>
                                    <td class="font-weight-bold">{{ ucfirst($content->status) }}</td>
                                    <td>
                                        <a href="{{ route('content.edit', $content->id) }}" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('content.destroy', $content->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus konten ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data konten.</td>
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

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showImage(imageUrl) {
            Swal.fire({
                imageUrl: imageUrl,
                imageAlt: 'Gambar/Video Konten',
                showCloseButton: true,
                confirmButtonText: 'Tutup'
            });
        }
    </script>
@endsection
