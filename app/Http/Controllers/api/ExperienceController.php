<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceRequest;
use App\Http\Resources\ExperienceResource;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ExperienceController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return ExperienceResource::collection(Experience::all());
    }

    public function store(ExperienceRequest $request)
    {
        $experience = Experience::create($request->all());

        $experience->users()->attach($request->user_id);

        return $experience;

    }

    public function show(Experience $experience): Experience
    {
        return $experience;
    }

    public function update(ExperienceRequest $request, Experience $experience): Experience
    {
        $experience->update($request->all());
        return $experience;
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
    }
}
