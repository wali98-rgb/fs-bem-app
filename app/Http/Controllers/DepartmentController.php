<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depts = Department::all();

        if ($depts->isEmpty()) {
            $dept = Department::all();
        } else {
            $dept = Department::orderBy('name_dpt', 'asc')->paginate('10');
        }

        $title = 'Hapus Departemen Kabinet!';
        $text = "Anda yakin ingin menghapusnya?";
        confirmDelete($title, $text);

        return view('admin.pages.departments.index', compact('dept'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_dpt' => 'required'
        ]);

        Department::create([
            'name_dpt' => $request->name_dpt
        ]);

        Alert::toast('Departemen Kabinet berhasil dibuat.', 'success');
        return redirect()->route('department.index');
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
        $dept = Department::findOrFail($id);
        return view('admin.pages.departments.edit', compact('dept'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_dpt' => 'required'
        ]);

        $dept = Department::findOrFail($id);

        $dept->update([
            'name_dpt' => $request->name_dpt
        ]);

        Alert::toast('Departemen Kabinet berhasil diubah.', 'success');
        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dept = Department::findOrFail($id);

        $dept->delete();

        Alert::alert('Berhasil', 'Departemen Kabinet berhasil dihapus.', 'succee');
        return redirect()->back();
    }
}
