<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EducationRequest;
use App\Http\Resources\EducationResource;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use JetBrains\PhpStorm\Pure;

class EducationController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return EducationResource::collection(Education::all());
    }

    public function store(EducationRequest $request): EducationResource
    {

        $education = Education::create($request->validated());
        $education->users()->attach($request->user_id);

        return new EducationResource($education);
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

    public function destroy(Education $education)
    {
        $education->delete();
    }
}
