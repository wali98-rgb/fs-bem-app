<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    /**
     * Tampilkan daftar konten.
     */
    public function index()
    {
        $contents = Content::orderBy('date', 'desc')->paginate(10); // Menampilkan data dengan pagination
        return view('admin.pages.contents.index', compact('contents')); // View daftar konten
    }

    /**
     * Form untuk menambah konten baru.
     */
    public function create()
    {
        return view('admin.pages.contents.create'); // View form tambah konten
    }

    /**
     * Simpan data konten baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'date' => 'required|date',
            'description' => 'required|string|max:255',
            'content' => 'nullable|file|mimes:jpeg,png,jpg,mp4,txt|max:20480', // Max 20 MB
            'media_url' => 'nullable|url',
            'media_type' => 'nullable|in:image,video,text',
            'status' => 'nullable|in:approve,pending,refuse',
        ]);

        // Jika ada file yang diupload
        $filePath = null;
        if ($request->hasFile('content')) {
            $filePath = $request->file('content')->store('uploads', 'public');
        }

        // Simpan data ke database
        Content::create([
            'user_id' => Auth::id(), // ID user yang login
            'date' => $request->date,
            'description' => $request->description,
            'content' => $filePath, // Simpan path file
            'media_url' => $request->media_url,
            'media_type' => $request->media_type,
            'status' => $request->status ?? 'pending', // Default ke pending
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('content.index')->with('success', 'Konten berhasil ditambahkan.');
    }

    /**
     * Form untuk mengedit konten.
     */
    public function edit(Content $content)
    {
        return view('admin.pages.contents.edit', compact('content')); // View form edit konten
    }

    /**
     * Update data konten.
     */
    public function update(Request $request, Content $content)
    {
        // Validasi input
        $request->validate([
            'date' => 'required|date',
            'description' => 'required|string|max:255',
            'content' => 'nullable|string',
            'media_url' => 'nullable|url',
            'media_type' => 'nullable|in:image,video,text',
            'status' => 'nullable|in:approve,pending,refuse',
        ]);

        // Update data konten
        $content->update([
            'date' => $request->date,
            'description' => $request->description,
            'content' => $request->content,
            'media_url' => $request->media_url,
            'media_type' => $request->media_type,
            'status' => $request->status ?? 'pending',
        ]);

        return redirect()->route('content.index')->with('success', 'Konten berhasil diperbarui.');
    }

    /**
     * Hapus konten.
     */
    public function destroy(Content $content)
    {
        $content->delete(); // Hapus data konten
        return redirect()->route('content.index')->with('success', 'Konten berhasil dihapus.');
    }
}
