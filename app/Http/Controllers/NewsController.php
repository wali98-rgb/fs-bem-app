<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        return view("admin.pages.news.index")->with("news", News::all());
    }

    public function create()
    {
        return view("admin.pages.news.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_berita' => 'required|max:2048',
            'nama' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required'
        ]);

        if ($request->hasFile('file_berita')) {
            $file = $request->file('file_berita');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs(public_path('berita_acara'), $fileName);
        }

        News::create([
            'file_berita' => $fileName,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('news.index')->with('message', "Berita Acara berhasil ditambahkan.");
    }

    public function edit($id)
    {
        return view("admin.pages.news.edit")->with('news', News::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'file_berita' => 'required|max:2048',
            'nama' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required'
        ]);

        $news = News::findOrFail($id);
        $news->update([$request->all()]);

        return redirect()->route('news.index')->with('message', "Berita Acarq sudah diupdate.");
    }

    public function delete($id)
    {
        $news = News::findOrFail($id);
        Storage::delete('berita_acara/' . $news->file_berita);
        $news->delete();
        return redirect()->route('news.index')->with("message", "Berita Acara berhasil dihapus.");
    }
}
