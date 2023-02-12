<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $users = User::all();
        $skills = Skill::all();
        //$newDate = $users->date_of_birth->format('d-m-Y');
        return view('about',compact('users','skills'));
    }
}
