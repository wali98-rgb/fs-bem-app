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
            'file_berita' => 'required|file|mimes:pdf,doc,docx,xls,csv,xlsx,jpg,jpeg,png,MOC,txt',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date'
        ]);

        if ($request->hasFile('file_berita')) {
            $file = $request->file('file_berita');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/news'), $fileName);
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
            'file_berita' => 'nullable|file|mimes:pdf,doc,docx,xls,csv,xlsx,jpg,jpeg,png,MOC,txt',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date'
        ]);

        if ($request->hasFile('file_berita')) {
            if ($request->file_berita && file_exists(public_path($request->file_berita))) {
                unlink(public_path($request->file_berita));
            }
            $file = $request->file('file_berita');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/news'), $fileName);
        }

        $news = News::findOrFail($id);
        $news->update([
            'file_berita' => $fileName,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('news.index')->with('message', "Berita Acara sudah diupdate.");
    }

    public function delete($id)
    {
        $news = News::findOrFail($id);
        unlink(public_path('files/news/' . $news->file_berita));
        $news->delete();
        return redirect()->route('news.index')->with("message", "Berita Acara berhasil dihapus.");
    }
}
