<div class="card-block table-border-style">
  <div class="container">
    <div class="container">
      <div class="row">
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
                <object data="{{ asset($fileURL) }}" type="application/pdf" width="100%" height="600px">
                  <embed src="{{ asset($fileURL) }}" type="application/pdf" />
                  <!-- Fallback jika browser tidak mendukung -->
                  <p>Browser Anda tidak mendukung menampilkan PDF.
                    <a href="{{ asset($fileURL) }}">Klik di sini untuk mengunduh file.</a>
                  </p>
                </object>
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