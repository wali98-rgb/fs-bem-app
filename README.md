## Arsip
Konsep nya CRUD + Gdrive
fitur untuk mengelola file penting BEM seperti :
- File ADRT
- File SOP
- File Template

## Berita acara
konsep seperti CRUD BLOG + middleware

## Artikel 
konsep seperti CRUD BLOG

## Berkas & Persuratan
Konsep nya CRUD + Gdrive
fitur untuk mengelola surat-surat dalam setiap kegiatan :
- file Notulensi
- file LPJ kegiatan
- file LPJ Tahunan
- file Peminjaman barang/ruangan/perizinan/pemberitahuan
- Laporan keuangan BEM
- Proposal

## Konten
Konsep seperti sosial media (Twitter , Instagram, Facebook)
fitur untuk mengelola konten BEM seperti :
- postingan
- komentar
- like

## Kuisioner -> Form pendaftaran 
Konsep seperti form pendaftaran online
fitur untuk mengelola data pendaftaran seperti :
- google form
- bisa export excel


# langkah pembuatan fitur
1. php artisan make:model namaModel -m
2. php artisan make:controller namaController
3. buat view resource/views/admin/pages/namaFolder
4. buat route di routes/web.php

php artisan make:model News
php artisan make:controller NewsController
php artisan make:migration create_news_table
buat view resource/views/admin/pages/news
buat route di routes/web.php -> cavin

php artisan make:model File
php artisan make:controller FileController
php artisan make:migration create_files_table
buat view resource/views/admin/pages/files
buat route di routes/web.php -> ceria

