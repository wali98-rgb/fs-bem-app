@extends('client.master')

@section('about')
    <div class="visi-misi-container">
        <div class="visi-img">
            <img src="{{ asset('plugins/frontend/img/bem.png') }}" alt="Photo">
        </div>
        <div class="visi-content">
            <h1>Visi</h1>
            <p class="visi">
                Mewujudkan Badan Eksekutif Mahasiswa Indonesia Mandiri sebagai penggerak terwujudnya mahasiswa yang
                adaftif dan interaktif terhadap lingkungan kampus dan masyarakat serta menjunjung tinggi
                profesionalitas, berfokus pada pengembangan prestasi dan implementasi nilai-nilai integritas organisasi.
            </p>

            <p class="misi">
                <h1>Misi</h1>
                <ul>
                    <li>Menciptakan Badan Eksekutif Mahasiswa Indonesia Mandiri berasas kekeluargaan, profesional serta
                        optimalisasi seluruh potensi dan aspirasi mahasiswa secara suportif.</li>
                    <li>Menciptakan hubungan yang sinergis antara organisasi mahasiswa STMIK dan STIE STAN INDONESIA
                        MANDIRI.</li>
                    <li>Mengoptimalisasi pewadahan dan penyaluran minat bakat mahasiswa STMIK dan STIE STAN INDONESIA
                        MANDIRI.</li>
                    <li>Mewujudkan gerakan mahasiswa yang efektif dan terbuka.</li>
                </ul>
            </p>
        </div>
    </div>
@endsection
