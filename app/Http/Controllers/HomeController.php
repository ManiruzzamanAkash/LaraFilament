<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::all();
        $posts = BlogPost::latest()->take(6)->get();

        return view('welcome', compact('categories', 'posts'));
    }
}
