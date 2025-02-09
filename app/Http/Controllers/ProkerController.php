<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Proker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prokers = Proker::with('department')->get();
        $pro = Proker::all();
        $depts = Department::all();

        $title = 'Hapus Program Kerja!';
        $text = "Anda yakin ingin menghapusnya?";
        confirmDelete($title, $text);

        return view('admin.pages.prokers.index', compact('prokers', 'pro', 'depts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $depts = Department::all();
        return view('admin.pages.prokers.create', compact('depts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'proker' => 'required|min:2',
            'desc_proker' => 'required',
            'dept_id' => 'required',
        ]);

        Proker::create([
            'proker' => $request->proker,
            'desc_proker' => $request->desc_proker,
            'dept_id' => $request->dept_id
        ]);

        Alert::toast('Program kerja berhasil ditambahkan.', 'success');
        return redirect()->route('proker.index');
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
        $proker = Proker::findOrFail($id);
        $depts = Department::all();
        return view('admin.pages.prokers.edit', compact('proker', 'depts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'proker' => 'required|min:2',
            'desc_proker' => 'required',
            'dept_id' => 'required',
        ]);

        $proker = Proker::findOrFail($id);

        $proker->update([
            'proker' => $request->proker,
            'desc_proker' => $request->desc_proker,
            'dept_id' => $request->dept_id
        ]);

        Alert::toast('Program kerja berhasil diubah.', 'success');
        return redirect()->route('proker.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proker = Proker::findOrFail($id);
        $proker->delete();

        Alert::alert('Berhasil', 'Program kerja berhasil dihapus.', 'success');
        return redirect()->back();
    }
}
