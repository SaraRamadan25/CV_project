<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceRequest;
use App\Http\Resources\ExperienceResource;
use App\Models\Experience;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use JetBrains\PhpStorm\Pure;

class ExperienceController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return ExperienceResource::collection(Experience::all());
    }

    public function store(ExperienceRequest $request): ExperienceResource
    {
        $experience = Experience::create($request->validated());
        $experience->users()->attach($request->user_id);

        return new ExperienceResource($experience);

    }

    #[Pure] public function show(Experience $experience): ExperienceResource
    {
        return new ExperienceResource($experience);
    }

    public function update(ExperienceRequest $request, Experience $experience): ExperienceResource
    {
        $experience->update($request->validated());
        return new ExperienceResource($experience);
    }

    public function destroy(Experience $experience): JsonResponse
    {
        $experience->delete();
        return response()->json(['message' => 'Experience deleted successfully']);
    }
}
