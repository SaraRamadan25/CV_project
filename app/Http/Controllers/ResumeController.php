<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        $experiences = Experience::all();
        return view('resume',compact('educations','experiences'));
    }
}
