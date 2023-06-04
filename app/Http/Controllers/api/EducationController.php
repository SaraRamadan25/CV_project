<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EducationRequest;
use App\Http\Resources\EducationResource;
use App\Models\Education;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use JetBrains\PhpStorm\Pure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class EducationController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return EducationResource::collection(Education::all());
    }

    public function store(EducationRequest $request): Application|ResponseFactory|Response
    {
        $education = Education::create($request->validated());
        $education->users()->attach($request->user_id);

        return response($education, 201);
    }

    #[Pure] public function show(Education $education): EducationResource
    {
        return new EducationResource($education);
    }

    public function update(EducationRequest $request, Education $education): EducationResource
    {
        $education->update($request->validated());
        return new EducationResource($education);
    }

    public function destroy(Education $education): JsonResponse
    {
        $education->delete();
        return response()->json(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
