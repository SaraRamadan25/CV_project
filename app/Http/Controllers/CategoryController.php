<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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

    //admin methods

    public function create(): Factory|View|Application
    {
        return view('category.create');
    }
    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'name' => 'required',
        ]);
        Category::create($data);
        return redirect()->route('category.index')->with('msg', 'Category created successfully');
    }

    public function edit(Category $category): Factory|View|Application
    {
        return view('category.edit', compact('category'));
    }

    public function update(Category $category): RedirectResponse
    {
        $data = request()->validate([
            'name' => 'required',
        ]);
        $category->update($data);
        
        return redirect()->route('category.index')->with('msg', 'Category updated successfully');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->projects()->delete();
        $category->delete();

        return redirect()->route('category.index')->with('msg', 'Category with its projects deleted successfully');
    }

}
