<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\User;

class ClientController extends Controller
{
    public function home()
    {
        $contents = Content::all();

        return view('client.app', compact('contents'));
    }

    public function pendidikan()
    {
        $contents = Content::all();

        return view('client.Pages.departements.pendidikan', compact('contents'));
    }


    public function index()
    {
        $users = User::all(); // Ambil semua data user dari tabel users
        return view('client.Pages.Angkatan.Elder2022', compact('users'));
    }

   
}
