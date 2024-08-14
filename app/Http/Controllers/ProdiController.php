<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodis = Prodi::all();

        if ($prodis->isEmpty()) {
            $prodi = Prodi::all();
        } else {
            $prodi = Prodi::first()->paginate(5);
        }

        $title = 'Hapus Program Studi!';
        $text = "Anda yakin ingin menghapusnya?";
        confirmDelete($title, $text);

        return view('admin.pages.majors.index', compact('prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.majors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_prodi' => 'required',
            'level' => 'required|max:2'
        ]);

        Prodi::create([
            'name_prodi' => $request->name_prodi,
            'level' => $request->level
        ]);

        Alert::toast('Program Studi berhasil dibuat.', 'success');
        return redirect()->route('major.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodi = Prodi::findOrFail($id);
        return view('admin.pages.majors.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_prodi' => 'required',
            'level' => 'required|max:2'
        ]);

        $prodi = Prodi::findOrFail($id);

        $prodi->update([
            'name_prodi' => $request->name_prodi,
            'level' => $request->level
        ]);

        Alert::toast('Program Studi berhasil diubah.', 'success');
        return redirect()->route('major.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prodi = Prodi::findOrFail($id);

        $prodi->delete();
        Alert::alert('Sukses', 'Program studi berhasil dihapus.', 'success');

        return redirect()->route('major.index');
    }
}
