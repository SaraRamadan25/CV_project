<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('projects.index',compact('categories'));
    }
    public function show($id)
    {
        $category = Category::find($id);
        $projects = $category->projects;

        return view('categories.show', compact('category', 'projects'));
    }
}
