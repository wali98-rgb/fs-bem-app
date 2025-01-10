<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('user-permission');
    }
    public function index()
    {
        return view('admin.pages.archives.index');
    }
}
