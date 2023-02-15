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
    public function show(Category $category)
    {

        $projects = $category->projects;
        $category = Category::findOrFail($category);

        return view('category.show', compact('category'));
    }
}
