<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $projects = Project::all();
        return view('categories.index',compact('categories','projects'));
    }

        public function show(Category $category)
    {
        $projects = $category->projects;

        return view('categories.show', compact('category', 'projects'));
    }

}
