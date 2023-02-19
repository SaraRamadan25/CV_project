<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Education;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function create(): Factory|View|Application
    {
        $speeches =['Arabic','English','German','Spanish','French'];
        $expert_in =['UI/UX','Frontend','Backend','Datascience','Data Analysis'];
        $educations = Education::all();
        $experiences= Experience::all();
        return view('users.create',compact('speeches','experiences','expert_in','educations'));
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $user = User::create([
            'name'=>$request->name,
            'excerpt'=>$request->excerpt,
            'description'=>$request->description,
            'email'=>$request->email,
            'password'=>$request->password,
            'date_of_birth'=>$request->date_of_birth,
            'expert_in'=>$request->expert_in,
            'speeches'=>$request->speeches

        ]);


       /* $user= User::find($user_id);
        $user->educations()->attach($education_id);*/

       /* $user->educations()
            ->sync(request('educations'));

        $user->experiences()
            ->sync(request('experiences'));*/

        //  don't work

        return redirect()->route('users.index');


    }

    public function edit($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::findOrFail($id);
        $speeches =['Arabic','English','German','Spanish','French'];
        $experiences =['UI/UX','Frontend','Backend','Datascience','Data Analysis'];
        return view('users.edit',compact('speeches','experiences','user'));

    }
    public function update(UserRequest $request,$id): \Illuminate\Http\RedirectResponse
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
        return redirect()->route('users.index')->with('msg','user updated successfully');
    }
}
