<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $testimonials = $user->testimonials;

        return view('testimonials.index',compact('testimonials'));
    }
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('testimonials.create');
    }
    public function store(TestimonialRequest $request): \Illuminate\Http\RedirectResponse
    {
        $img = $request->file('image');
        $ext = $img->getClientOriginalExtension();
        $image_name = "testimonial-$request->id.$ext";
        $img->move(public_path('storage/app/uploadedPhotos'),$image_name);

        Testimonial::create([
            'name'=>$request->name,
            'role'=>$request->role,
            'description'=>$request->description,
            'image'=>$image_name

        ]);
        return redirect()->back()->with('msg','Testimonial added successfully');
    }


    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view ('testimonials.edit',compact ('testimonial'));

    }
    public function update(TestimonialRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update([
            'name'=>$request->name,
            'role'=>$request->role,
            'description'=>$request->description,
        ]);
        return redirect()->route('testimonials.index')->with('msg','Testimonial updated successfully');
    }


}
