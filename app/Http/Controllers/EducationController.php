<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EducationController extends Controller
{
    public function index(): Factory|View|Application
    {
        $user = Auth::user();

        $educations = $user->educations;
        $experiences = $user->experiences;

        return view('education.index',compact('educations','experiences'));
    }
    public function create(): Factory|View|Application
    {
        $educations = Education::all();

        return view('education.create',compact('educations'));
    }

    public function store(EducationRequest $request): RedirectResponse
    {

        Education::create([
              'name'=>$request->name,
              'duration'=>$request->duration,
              'description'=>$request->description,
          ]);
        return redirect()->route('education.index')->with('msg','Education created successfully');
        }
        public function edit(Education $education): Factory|View|Application
        {
        return view('education.edit',compact('education'));
        }

        public function update(EducationRequest $request, Education $education): RedirectResponse
        {
            $data = $request->validated();
            $education->update($data);

            return redirect()->route('education.index')->with('msg','education updated successfully');

        }

}


