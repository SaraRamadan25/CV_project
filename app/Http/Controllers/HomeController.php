<?php

namespace App\Http\Controllers;

use App\Http\Requests\WelcomeRequest;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::query()->orderBy('created_at', 'desc')->first();
        $speeches =['Arabic','English','German','Spanish','French'];
        $experiences =['UI/UX','Frontend','Backend','Datascience','Data Analysis'];
        return view('welcome.index',compact('user','speeches','experiences'));
    }

public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
{
    $speeches =['Arabic','English','German','Spanish','French'];
    $experiences =['UI/UX','Frontend','Backend','Datascience','Data Analysis'];
    return view('welcome.create',compact('speeches','experiences'));
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
        'expert_in'=>$request->expert_in,
        'speeches'=>$request->speeches

    ]);
    return redirect()->back()->with('msg','user added successfully');

}

    public function edit($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::findOrFail($id);
        $speeches =['Arabic','English','German','Spanish','French'];
        $experiences =['UI/UX','Frontend','Backend','Datascience','Data Analysis'];
        return view('welcome.edit',compact('speeches','experiences','user'));

    }
    public function update(WelcomeRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $user = User::findOrFail($id);
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
        return redirect()->route('welcome.index')->with('msg','user updated successfully');
    }
}

