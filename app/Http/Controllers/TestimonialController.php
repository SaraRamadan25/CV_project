<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index(): Factory|View|Application
    {
        $user = Auth::user();
        $testimonials = $user->testimonials()->with('user:id')->paginate(5);

        return view('testimonial.index', compact('testimonials'));
    }

    public function create(): Factory|View|Application
    {
        return view('testimonial.create');
    }

    public function store(TestimonialRequest $request): RedirectResponse
    {
        $file = $request->file('image');
        $extension = $file->extension();
        $filename = uniqid().'.'.$extension;

        Storage::disk('public')->putFileAs('testimonials', $file, $filename);

        Testimonial::create($request->validated() + ['image' => $filename]);
        return redirect()->route('testimonial.index')->with('msg', 'Testimonial added successfully');
    }

    public function edit(Testimonial $testimonial): Factory|View|Application
    {
        return view('testimonial.edit', compact('testimonial'));
    }

    public function update(TestimonialRequest $request, Testimonial $testimonial): RedirectResponse
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

        return redirect()->route('testimonial.index')->with('msg', 'Testimonial updated successfully');
    }

}
