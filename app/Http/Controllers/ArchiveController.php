<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archive;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    public function index()
    {
        $archives = Archive::all();
        return view('admin.pages.archives.index', compact('archives'));
    }
    // Menampilkan form create
    public function create()
    {
        return view('admin.pages.archives.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'file'  => 'required|file|mimes:pdf,doc,docx,xls,csv,xlsx,jpg,jpeg,png,MOC,txt|max:30000000', // Contoh validasi file
        ]);

        // Simpan data ke database
        $archive = new Archive();
        $user = Auth::user();
        $archive->user_id = $user->id;
        $archive->title = $validatedData['title'];

        // Simpan file jika ada
        if ($request->hasFile('file')) {
            // Ambil file yang diunggah
            $file = $request->file('file');
            // Buat nama file unik menggunakan hashName() agar tidak ada konflik nama
            $hashFile = $request->file("file")->hashName();
            $fileName = time() . '-' . $hashFile;
            // Simpan file ke folder public/files/archive_file
            $file->move(public_path("files/archive_file"), $fileName);
            // Simpan path file ke database
            $archive->file = "files/archive_file/" . $fileName;
        }
        $archive->save();

        // Redirect dengan pesan sukses
        return redirect()->route('archives.index')
            ->with('success', 'Arsip Berhasil Ditambahkan');
    }
    // Menampilkan form edit
    public function edit(Archive $archive)
    {
        $archive = Archive::find($archive->id);
        return view('admin.pages.archives.edit', compact('archive'));
    }
    // Mengupdate data
    public function update(Request $request, Archive $archive)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'file'  => 'nullable|file|mimes:pdf,doc,docx,xls,csv,xlsx,jpg,jpeg,png,MOC,txt|max:30000000', // Validasi file
        ]);

        // Update title
        $archive->title = $validatedData['title'];

        // Simpan file jika ada
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($archive->file && file_exists(public_path($archive->file))) {
                unlink(public_path($archive->file)); // Menghapus file lama
            }

            // Ambil file yang diunggah dan buat nama file unik
            $file = $request->file('file');
            $fileName = time() . '-' . $file->hashName();

            // Simpan file ke folder public/files/archive_file dan update path di database
            $file->storeAs('public/files/archive_file', $fileName);

            // Simpan path file ke database
            $archive->file = "storage/files/archive_file/" . $fileName;
        }

        // Simpan perubahan ke database
        $archive->save();

        // Redirect dengan pesan sukses
        return redirect()->route('archive.index')
            ->with('success', 'Arsip Berhasil di Update');
    }

        // Menghapus data
        public function destroy(Archive $archive)
        {
            $archive = Archive::find($archive->id);
            $archive->delete();
            return redirect()->route('archive.index')
            ->with('success', 'Arsip Berhasil di Hapus');
        }
}
