<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Http\Resources\TestimonialResource;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
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
        $filename = uniqid().'.'.$extension;
        Storage::disk('public')->putFileAs('testimonials', $file, $filename);

        $testimonial = Testimonial::create(
            array_merge($request->validated(), ['image' => $filename])
        );

        return response(new TestimonialResource($testimonial), 201);
    }

    public function show(Testimonial $testimonial): TestimonialResource
    {
        $testimonial->load('user:id');
        return new TestimonialResource($testimonial);
    }


    public function update(TestimonialRequest $request, Testimonial $testimonial): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $filename = uniqid().'.'.$extension;

            Storage::disk('public')->putFileAs('testimonials', $file, $filename);
            $data['image'] = $filename;
        }

        $testimonial->update($data);

        return response()->json(['message' => 'Testimonial updated successfully']);
    }


    public function destroy(Testimonial $testimonial): JsonResponse
    {
        $testimonial->delete();
        return response()->json(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
