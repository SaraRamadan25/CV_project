<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function index(): Factory|View|Application
    {
        $user = Auth::user();
        $testimonials = $user->testimonials;

        return view('testimonial.index',compact('testimonials'));
    }
    public function create(): Factory|View|Application
    {
        return view('testimonial.create');
    }
    public function store(TestimonialRequest $request): RedirectResponse
    {
        $img = $request->file('image');
        $ext = $img->extension();
        $image_name = "testimonial-$request->id.$ext";
        $img->move(public_path('storage/app/uploadedPhotos'),$image_name);

        Testimonial::create([
            'name'=>$request->name,
            'role'=>$request->role,
            'description'=>$request->description,
            'image'=>$image_name,
            'user_id'=>Auth::id()

        ]);
        return redirect()->route('testimonial.index')->with('msg','Testimonial added successfully');
    }

    public function edit(Testimonial $testimonial): Factory|View|Application
    {

        return view ('testimonial.edit',compact ('testimonial'));

    }
    public function update(TestimonialRequest $request,Testimonial $testimonial): RedirectResponse
    {
        $data = $request->validated();
        $testimonial->update($data);

        return redirect()->route('testimonial.index')->with('msg','Testimonial updated successfully');
    }


}
