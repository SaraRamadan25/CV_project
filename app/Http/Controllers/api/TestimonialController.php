<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Http\Resources\TestimonialResource;
use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

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

        return response(Testimonial::create([
            'name' => $request['name'],
            'role' => $request['role'],
            'description' => $request['description'],
            'image' => $filename,
            'user_id' => $request['user_id'],
        ]), 200);
    }

    public function show(Testimonial $testimonial): Testimonial
    {
        return $testimonial;
    }

    public function update(Request $request, Testimonial $testimonial): Testimonial
    {
         $testimonial->update($request->all());
         return $testimonial;
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
    }
}
