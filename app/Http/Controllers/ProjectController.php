<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
public function index(){
    $categories = Category::all();
    $projects = Project::all();
    return view('projects.index',compact('categories','projects'));
}

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        return view('projects.create',compact('categories'));
    }
    public function store(ProjectRequest $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        Project::create([
            'name'=>$request->name,
            'type'=>$request->type,
            'image'=>$request->file('image')->store('public/images'),
            'category_id'=>$request->category_id,
            'user_id'=>auth()->id()
        ]);
        return redirect('index');
    }
    public function edit(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        return view('projects.create',compact('categories'));
    }
    public function update(ProjectRequest $request,$id)
    {
        $project = Project::findOrFail($id);
        Project::update([
            'name'=>$request->name,
            'type'=>$request->type,
            'image'=>$request->file('image')->store('public/images'),
            'category_id'=>$request->category_id,
        ]);
    }

}
