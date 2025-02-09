<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Proker;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProker()
    {
        $depts = Department::all();
        $pro = Proker::all();
        return view('admin.pages.files.show-proker', compact('depts', 'pro'));
    }

    public function index(Proker $proker)
    {
        $files = File::where('proker_id', $proker->id)->get();
        return view('admin.pages.files.index', compact('files', 'proker'));
    }

    public function create(Proker $proker)
    {
        return view('admin.pages.files.create', compact('proker'));
    }

    public function store(Request $request, Proker $proker)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'file_berkas' => 'required|mimes:pdf,doc,docx|max:2048',
            'nama_berkas' => 'required|string|max:150',
            'tipe_berkas' => 'required|in:0,1,2,3',
            'tanggal_acara' => 'required|date',
        ]);

        if ($request->hasFile('file_berkas')) {
            $file = $request->file('file_berkas');
            $path = $file->store('public/files');
        
            File::create([
                'file_berkas' => $path,
                'nama_berkas' => $request->nama_berkas,
                'tipe_berkas' => $request->tipe_berkas,
                'url_berkas' => Storage::url($path),
                'tanggal_acara' => $request->tanggal_acara,
                'proker_id' => $proker->id,
                'user_id' => auth()->id(),
            ]);
            
            return redirect()->route('files.index', $proker->id)->with('success', 'Berkas berhasil ditambahkan');
        }
        return back()->with('error', 'Terjadi kesalahan saat mengunggah berkas');
    }

    public function edit(Proker $proker, File $file)
    {
        return view('admin.pages.files.edit', compact('proker', 'file'));
    }

    public function update(Request $request, Proker $proker, File $file)
    {
        $request->validate([
            'nama_berkas' => 'required|string|max:150',
            'tipe_berkas' => 'required|in:0,1,2,3',
            'tanggal_acara' => 'required|date',
            'file_berkas' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('file_berkas')) {
            // Delete old file
            if ($file->file_berkas) {
                Storage::delete($file->file_berkas);
            }

            // Store new file
            $newFile = $request->file('file_berkas');
            $path = $newFile->store('public/files');
            
            $file->file_berkas = $path;
            $file->url_berkas = Storage::url($path);
        }

        $file->nama_berkas = $request->nama_berkas;
        $file->tipe_berkas = $request->tipe_berkas;
        $file->tanggal_acara = $request->tanggal_acara;
        $file->save();

        return redirect()->route('files.index', $proker->id)
            ->with('success', 'Berkas berhasil diperbarui');
    }

    public function destroy(Proker $proker, File $file)
    {
        if ($file->file_berkas) {
            Storage::delete($file->file_berkas);
        }
        
        $file->delete();

        return redirect()->route('files.index', $proker->id)
            ->with('success', 'Berkas berhasil dihapus');
    }
}