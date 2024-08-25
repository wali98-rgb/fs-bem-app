@extends('admin.layouts.master')

@section('css_plus')
    <style>
        .docum-image {
            line-height: 0;
            overflow: hidden;
            border-radius: .3rem;
        }

        .docum-image img {
            filter: blur(0px);
            transition: filter 0.3s ease-in;
            transform: scale(1.1);
        }

        .docum-title {
            font-size: 1em;
            font-weight: bold;
            text-decoration: none;
            z-index: 1;
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity .5s;
            background: rgba(90, 0, 10, 0.4);
            color: white;
            column-gap: 5px;

            /* position the text in t’ middle*/
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .docum-title a {
            font-size: .7rem;
        }

        .docum-listing {
            position: relative;
            border-radius: .3rem;
        }

        .docum-listing:hover .docum-title {
            opacity: 1;
        }

        .docum-listing:hover .docum-image img {
            filter: blur(2px);
        }

        /* for touch screen devices */
        @media (hover: none) {
            .docum-title {
                opacity: 1;
            }

            .docum-image img {
                filter: blur(2px);
            }
        }
    </style>
@endsection

@section('content')
    {{-- Page-header start --}}
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="bi bi-images bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Dokumentasi Kegiatan</h4>
                        <span>Dokumentasi dari program kerja tiap departemen kabinet BEM Indonesia Mandiri.</span>
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
                        <li class="breadcrumb-item"><a href="{{ route('docum.index') }}">Dokumentasi</a>
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
                <a href="{{ route('docum.create') }}" class="btn btn-primary btn-round">Tambah Dokumentasi Kegiatan</a>
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
                <div class="sub-title">Dokumentasi Kegiatan Program Kerja</div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
                    @forelse ($prokers as $item)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('!4dm1n/docum#' . $item->id) ? 'active' : '' }}"
                                data-toggle="tab" href="#{{ $item->id }}" role="tab">{{ $item->proker }}</a>
                            <div class="slide"></div>
                        </li>
                    @empty
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#" role="tab"
                                @disabled(true)>Tambahkan proker terlebih dahulu.</a>
                            <div class="slide"></div>
                        </li>
                    @endforelse
                </ul>
                <!-- Tab panes -->


                <div class="tab-content tabs-left-content card-block">
                    @forelse ($prokers as $proker)
                        <div class="tab-pane {{ request()->is('!4dm1n/docum#' . $proker->id) ? 'active' : '' }}"
                            id="{{ $proker->id }}" role="tabpanel"">
                            @foreach ($docums as $key => $item)
                                @if ($item->proker_id === $proker->id)
                                    <div
                                        style="padding: 15px; box-sizing: border-box; width: 100%; columns: 4; column-gap: 15px;">
                                        @foreach (json_decode($item->docum) as $index => $documPath)
                                            <div class="docum-listing">
                                                <div class="docum-image mb-3">
                                                    <a href="#">
                                                        <img style="border: .5px solid silver; border-radius: .3rem; width: 100%;"
                                                            src="{{ asset($documPath) }}" alt="{{ $item->docum }}">
                                                    </a>
                                                </div>
                                                <div class="docum-title">
                                                    <a href="{{ route('docum.deleteImage', ['docum' => $item->id, 'imageIndex' => $index]) }}"
                                                        class="btn btn-danger btn-round"
                                                        data-confirm-delete="true">HAPUS</a>
                                                    <a href="{{ route('docum.showImage', ['docum' => $item->id, 'imageIndex' => $index]) }}"
                                                        class="btn btn-primary btn-round">LIHAT</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @empty
                        <div class="tab-pane {{ request()->is('!4dm1n/docum#' . $documentation->proker->proker) ? 'active' : '' }}"
                            id="" role="tabpanel">
                            <p class="m-0">
                                Program kerja belum ditambahkan.
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
