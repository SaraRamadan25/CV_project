<?php

namespace App\Http\Controllers;

use App\Http\Requests\WelcomeRequest;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $user = User::query()->orderBy('created_at', 'desc')->first();
        $skills = Skill::all();
        return view('about.index',compact('user','skills'));
    }
    public function create()
    {

        $speeches = ['Arabic', 'English', 'German', 'Spanish', 'French'];
        $experiences = ['UI/UX', 'Frontend', 'Backend', 'Datascience', 'Data Analysis'];
        return view('about.create', compact('speeches', 'experiences'));
    }

        public function store(WelcomeRequest $request): \Illuminate\Http\RedirectResponse

    {
        User::create([
            'name'=>$request->name,
            'excerpt'=>$request->excerpt,
            'description'=>$request->description,
            'email'=>$request->email,
            'password'=>$request->password,
            'date_of_birth'=>$request->date_of_birth,
            'speeches'=>$request->speeches,
            'expert_in'=>$request->expert_in

        ]);
        return redirect()->back()->with('msg','user added successfully');

    }
    public function edit($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::findOrFail($id);
        $languages =['Arabic','English','German','Spanish','French'];
        $experiences =['UI/UX','Frontend','Backend','Datascience','Data Analysis'];
        return view('about.edit',compact('languages','experiences','user'));

    }
    public function update(WelcomeRequest $request,User $user): \Illuminate\Http\RedirectResponse
    {
        $user->update([
            'name'=>$request->name,
            'excerpt'=>$request->excerpt,
            'description'=>$request->description,
            'email'=>$request->email,
            'password'=>$request->password,
            'date_of_birth'=>$request->date_of_birth,
            'speeches'=>$request->speeches,
            'expert_in'=>$request->expert_in
        ]);
        return redirect()->route('about.index')->with('msg','user updated successfully');
    }
}
