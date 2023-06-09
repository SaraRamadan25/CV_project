<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Education;
use App\Models\Experience;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(): Factory|View|Application
    {
        $lastAuthenticatedUser = User::where('id', Auth::id())->latest()->first();

        $skills = $lastAuthenticatedUser->skills;

        return view('user.index',compact('lastAuthenticatedUser','skills'));
    }

    public function create(){
        $speeches =['Arabic','English','German','Spanish','French'];
        $expert_in =['UI/UX','Frontend','Backend','Datascience','Data Analysis'];
        $educations = Education::all();
        $experiences= Experience::all();
        return view('user.create',compact('speeches','experiences','expert_in','educations'));
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $img = $request->file('image');
        $ext = $img->getClientOriginalExtension();
        $image_name = "testimonial-$request->id.$ext";
        $img->move(public_path('storage/app/uploadedPhotos'),$image_name);

        User::create([
            'name'=>$request->name,
            'excerpt'=>$request->excerpt,
            'description'=>$request->description,
            'email'=>$request->email,
            'password'=>$request->password,
            'date_of_birth' => Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->format('d/m/Y'),
            'expert_in'=>$request->expert_in,
            'speeches'=>$request->speeches,
            'image'=>$image_name,
            'freelance'=>$request->freelance,

        ]);
        $user = Auth::user();

        $user->educations()
            ->sync
            (request('education_id'));

        $user->experiences()
            ->sync
            (request('experience_id'));
        return redirect()->route('user.index')->with('msg','user created successfully');

    }
    public function edit(User $user): Factory|View|Application
    {
        $educations = Education::all();
        $speeches =['Arabic','English','German','Spanish','French'];
        $expert_in =['UI/UX','Frontend','Backend','Datascience','Data Analysis'];

        return view('user.edit',compact('speeches','expert_in','user','educations'));

    }
    public function update(UserRequest $request,User $user): RedirectResponse
    {
        $data = $request->validated();

        $user->educations()
            ->sync
            (request('education_id'));

        $user->update($data);

        return redirect()->route('user.index')->with('msg','user updated successfully');
    }

}
