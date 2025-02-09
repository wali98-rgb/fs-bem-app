<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home()
    {
        $contents = Content::all();

        return view('client.app', compact('contents'));
    }
    public function ukm()
    {
        return view('client.pages.ukm');
    }

}
