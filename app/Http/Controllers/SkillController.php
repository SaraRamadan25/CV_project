<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function create(): Factory|View|Application
    {

        return view('skill.create');
    }

    public function store(SkillRequest $request): Redirector|Application|RedirectResponse
    {

        Skill::create([
            'name'=>$request->name,
            'percentage'=>$request->percentage,
            'user_id'=>Auth::id()

        ]);

        return redirect('user')->with('msg','skill added successfully');
    }

    public function edit(Skill $skill): Factory|View|Application
    {
        return view('skill.edit',compact('skill'));
    }

    public function update(SkillRequest $request, Skill $skill ): RedirectResponse
    {
        $data = $request->validated();
        $skill->update($data);

        return redirect()->route('user.index')->with('msg', 'skill updated successfully');


    }

}
