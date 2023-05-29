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

class SkillController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return SkillResource::collection(Skill::all());
    }

    public function store(SkillRequest $request): Response|Application|ResponseFactory
    {
        return response(Skill::create([
            'name' => $request['name'],
            'percentage' => $request['percentage'],
            'user_id' => $request['user_id'],
        ]), 200);
    }

    #[Pure] public function show(Skill $skill): SkillResource
    {
        return new SkillResource($skill);
    }

    public function update(Request $request, Skill $skill): SkillResource
    {
        $skill->update($request->all());
        return new SkillResource($skill);
    }

    public function destroy(Skill $skill): JsonResponse
    {
        $skill->delete();

        return response()->json(['message' => 'Skill deleted successfully'], 200);
    }
}
