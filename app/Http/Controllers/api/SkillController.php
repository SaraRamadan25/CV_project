<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class SkillController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return SkillResource::collection(Skill::all());
    }

    public function store(SkillRequest $request): Response|Application|ResponseFactory
    {
        $attributes = $request->validated();
        $skill = Skill::create($attributes);
        return response ($skill, 201);
    }

    #[Pure] public function show(Skill $skill): SkillResource
    {
        return new SkillResource($skill);
    }

    public function update(SkillRequest $request, Skill $skill): SkillResource
    {
        $skill->update($request->validated());
        return new SkillResource($skill);
    }

    public function destroy(Skill $skill): JsonResponse
    {
        $skill->delete();
        return response()->json(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
