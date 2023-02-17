<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $services = $user->services;
        return view('services.index',compact('services'));
    }
    public function create(){
        return view('services.create');
    }
    public function store(ServiceRequest $request): \Illuminate\Http\RedirectResponse
    {
        Service::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'user_id'=>auth()->id()
            ]);
        return redirect('services.index')->with('msg','service added successfully');

    }
    public function edit($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $service = Service::findOrFail($id);
        return view('services.edit',compact('service'));
    }
    public function update(ServiceRequest $request,$id){

        $service = Service::findOrFail($id);
        $request->update([
            'name'=>$request->name,
            'description'=>$request->description
        ]);
    }
}
