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
use Illuminate\Support\Facades\Storage;

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
    public function store(TestimonialRequest $request)
    {
        $file = $request->file('image');
        $extension = $file->extension();
        $filename = uniqid() . '.' . $extension;

        Storage::disk('public')->putFileAs('testimonials', $file, $filename);

        Testimonial::create([
            'name' => $request->name,
            'role' => $request->role,
            'description' => $request->description,
            'image' => $filename,
            'user_id' => Auth::id()
        ]);
        return redirect()->route('testimonial.index')->with('msg', 'Testimonial added successfully');
    }


    public function edit(Testimonial $testimonial): Factory|View|Application
    {

        return view ('testimonial.edit',compact ('testimonial'));

    }
    public function update(TestimonialRequest $request,Testimonial $testimonial): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $data['image'] = $imagePath;
        }

        $testimonial->update($data);

        return redirect()->route('testimonial.index')->with('msg','Testimonial updated successfully');
    }

}
