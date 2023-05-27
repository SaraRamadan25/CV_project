<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function index(): Factory|View|Application
    {
        $categories = Category::all();
        $projects = Project::all();

        return view('category.index',compact('categories','projects'));
    }

        public function show(Category $category): Factory|View
        {
        $projects = $category->projects;

        return view('category.show', compact('category', 'projects'));
    }

}
