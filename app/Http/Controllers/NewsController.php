<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function create()
    {
        return view("admin.pages.news.create");
    }

    public function edit()
    {
        return view("admin.pages.news.edit");
    }
}
