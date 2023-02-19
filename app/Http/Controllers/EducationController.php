<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $educations = $user->educations;
        $experiences = $user->experiences;
        return view('educations.index',compact('educations','experiences'));
    }
    public function create(){
        return view('educations.create');
    }

    public function store(EducationRequest $request)
    {
          Education::create([
              'name'=>$request->name,
              'duration'=>$request->duration,
              'description'=>$request->description
          ]);

        }

}


