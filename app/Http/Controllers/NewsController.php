<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view("admin.pages.news.index", compact(['news']));
    }

    public function create()
    {
        return view("admin.pages.news.create");
    }

    public function edit()
    {
        return view("admin.pages.news.edit");
    }

    public function delete() {}
}
