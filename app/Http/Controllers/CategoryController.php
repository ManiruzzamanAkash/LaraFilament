<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::all();
        return view('categories.index', compact('categories'));
    }

    public function show($slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->latest()->paginate(10);
        return view('categories.show', compact('category', 'posts'));
    }
}
