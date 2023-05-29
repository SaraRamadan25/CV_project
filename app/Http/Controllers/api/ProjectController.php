<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use JetBrains\PhpStorm\Pure;

class ProjectController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ProjectResource::collection(Project::all());
    }

    public function store(ProjectRequest $request) :Response
    {
        return response(Project::create([
            'name' => $request['name'],
            'type' => $request['type'],
            'image' =>  $request['image']->store('images', 'public'),
            'user_id' => $request['user_id'],
            'category_id' => $request['category_id'],

        ]), 200);

    }

    #[Pure] public function show(Project $project): ProjectResource
    {
        return new ProjectResource($project);
    }

    public function update(Request $request, Project $project): ProjectResource
    {
         $project->update($request->all());
         return new ProjectResource($project);
    }

    public function destroy(Project $project)
    {
        $project->delete();
    }
}
