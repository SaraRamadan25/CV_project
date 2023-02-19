<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    public function index()
    {
            $user = Auth::user();
            $educations = $user->educations;
            $experiences = $user->experiences;
        return view('experiences.index',compact('educations','experiences'));
    }
    public function create(){
        return view('experiences.create');
    }
    public function store(ExperienceRequest $request)
    {
        {
            Experience::create([
                'name'=>$request->name,
                'duration'=>$request->duration,
                'description'=>$request->description
            ]);
        }
    }
}
