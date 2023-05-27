<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EducationRequest;
use App\Http\Resources\EducationResource;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EducationController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return EducationResource::collection(Education::all());

    }

    public function store(EducationRequest $request)
    {
        $education = Education::create($request->all());

        $education->users()->attach($request->user_id);

        return $education;
    }


    public function show(Education $education): Education
    {
        return $education;
    }


    public function update(EducationRequest $request, Education $education)
    {
        $education->update($request->all());
        return $education;
    }

    public function destroy(Education $education)
    {
        $education->delete();
    }
}
