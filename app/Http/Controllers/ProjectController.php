<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
public function index(): Factory|View|Application
    {
    $user = Auth::user();

    $categories = Category::all();
    $projects = $user->projects ;

    return view('project.index',compact('categories','projects'));
}

    public function create(): Factory|View|Application
    {
        $categories = Category::all();

        return view('project.create',compact('categories'));
    }
    public function store(ProjectRequest $request): Redirector|Application|RedirectResponse
    {
        Project::create([
            'name'=>$request->name,
            'type'=>$request->type,
            'image' => $request['image']->store('images', 'public'),
            'category_id'=>$request->category_id,
            'user_id'=>auth()->id()
        ]);

        return redirect()->route('project.index');
    }
    public function edit(Project $project): Factory|View|Application
    {
        $categories = Category::all();

        return view('project.edit',compact('categories','project'));
    }

    public function update(ProjectRequest $request,Project $project): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $data['image'] = $imagePath;
        }

        $project->update($data);

        return redirect()->route('project.index')->with('msg', 'Project updated successfully');

    }

}
