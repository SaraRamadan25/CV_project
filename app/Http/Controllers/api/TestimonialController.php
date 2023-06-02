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

class TestimonialController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return TestimonialResource::collection(Testimonial::all());
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

        return response(new TestimonialResource($testimonial), 200);
    }

    #[Pure] public function show(Testimonial $testimonial): TestimonialResource
    {
        return new TestimonialResource($testimonial);
    }

    public function update(TestimonialRequest $request, Testimonial $testimonial): TestimonialResource
    {
         $testimonial->update($request->validated());
        return new TestimonialResource($testimonial);
    }

    public function destroy(Testimonial $testimonial): JsonResponse
    {
        $testimonial->delete();
        return response()->json(['message' => 'Testimonial deleted successfully']);

    }
}
