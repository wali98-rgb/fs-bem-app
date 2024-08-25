<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use App\Models\Proker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prokers = Proker::all();
        $documentation = Documentation::with('proker')->get();
        $docums = Documentation::all();

        $title = 'Hapus Dokumentasi Kegiatan!';
        $text = "Anda yakin ingin menghapusnya?";
        confirmDelete($title, $text);

        return view('admin.pages.documentations.index', compact('prokers', 'documentation', 'docums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prokers = Proker::all();

        return view('admin.pages.documentations.create', compact('prokers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'docums.*' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        // Menyimpan gambar ke storage dan mendapatkan pathnya
        $imagePaths = [];
        if ($request->hasFile('docums')) {
            foreach ($request->file('docums') as $docum) {
                $imageName = time() . '_' . $docum->hashName();
                $docum->move(public_path('docum_img'), $imageName);
                // $path = $docum->store('docum_img', 'public');
                $imagePaths[] = 'docum_img/' . $imageName;
            }
        }

        // Menyimpan gambar ke database
        $documentation = new Documentation();
        $documentation->proker_id = $request->proker_id;
        $documentation->docum = json_encode($imagePaths);
        $documentation->save();

        Alert::toast('Dokumentasi berhasil ditambahkan', 'success');
        return redirect()->route('docum.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function showImage(Documentation $docum, $imageIndex)
    {
        // Mengambil semua path gambar dari database
        $imagePaths = json_decode($docum->docum, true);

        // Memastikan index yang diberikan valid
        if (isset($imagePaths[$imageIndex])) {
            // Mengambil path gambar berdasarkan index
            $imagePath = $imagePaths[$imageIndex];

            // Mengirimkan path gambar ke tampilan halaman
            // Alert::image('', '', $imagePath, '10rem', '10rem', 'Dokumentasi Kegiatan');
            alert()->image('', '', asset($imagePath), '90%', '90%', 'Dokumentasi Kegiatan');
            return redirect()->back();
        } else {
            Alert::alert('Dokumentasi tidak ditemukan', 'error');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        //
    }

    public function deleteImage(Documentation $docum, $imageIndex)
    {
        // Mengambil semua path gambar dari database
        $imagePaths = json_decode($docum->docum, true);

        // Memastikan index yang diberikan valid
        if (isset($imagePaths[$imageIndex])) {
            // Menghapus file gambar dari public folder
            $imagePath = public_path($imagePaths[$imageIndex]);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            // Menghapus data gambar dari array
            unset($imagePaths[$imageIndex]);

            // Memperbarui data array dan menyimpan kembali ke database
            $docum->docum = json_encode(array_values($imagePaths));
            $docum->save();

            Alert::alert('Berhasil', 'Dokumentasi berhasil dihapus', 'success');
            return redirect()->back();
        } else {
            Alert::alert('Tidak ditemukan!', 'Dokumentasi tidak ditemukan', 'error');
            return redirect()->back();
        }
    }
}
