<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Http\Resources\TestimonialResource;
use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TestimonialController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        $testimonials = Testimonial::with('user:id')->paginate(10);
        return TestimonialResource::collection($testimonials);
    }

    public function store(TestimonialRequest $request): Response
    {
        $file = $request->file('image');
        $extension = $file->extension();
        $filename = uniqid() . '.' . $extension;

        Storage::disk('public')->putFileAs('testimonials', $file, $filename);

        $testimonial = Testimonial::create([
            'name' => $request['name'],
            'role' => $request['role'],
            'description' => $request['description'],
            'image' => $filename,
            'user_id' => $request['user_id'],
        ]);

        return response(new TestimonialResource($testimonial), 201);
    }

    public function show(Testimonial $testimonial): TestimonialResource
    {
        $testimonial->load('user:id');
        return new TestimonialResource($testimonial);
    }

    public function update(TestimonialRequest $request, Testimonial $testimonial): JsonResponse
    {
         $testimonial->update($request->validated());
        return response()->json(['message' => 'Testimonial updated successfully']);
    }

    public function destroy(Testimonial $testimonial): JsonResponse
    {
        $testimonial->delete();
        return response()->json(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
