<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index(Category $category,)
    {

        $category->load('projects');

        return view('projects.index')->withCategory($category);
    }
    public function create(){
        $categories = Category::all();
        return view('projects.create',compact('categories'));
    }

}
