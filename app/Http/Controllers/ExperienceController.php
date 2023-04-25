<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    public function index(): Factory|View|Application
    {
            $user = Auth::user();

            $educations = $user->educations;
            $experiences = $user->experiences;

        return view('experience.index',compact('educations','experiences'));
    }
    public function create(): Factory|View|Application
    {
        return view('experience.create');
    }
    public function store(ExperienceRequest $request): RedirectResponse
    {

            Experience::create([
                'name' => $request->name,
                'duration' => $request->duration,
                'description' => $request->description,
            ]);
            return redirect()->route('experience.index')->with('msg','Experience created successfully');
        }

        public function edit(Experience $experience): Factory|View|Application
        {
            return view('experience.edit', compact('experience'));
        }

        public function update(ExperienceRequest $request, Experience $experience): RedirectResponse
        {
            $data = $request->validated();
            $experience->update($data);

            return redirect()->route('experience.index')->with('msg', 'experience updated successfully');

    }

}
