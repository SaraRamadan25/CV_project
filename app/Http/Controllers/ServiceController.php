<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(): Factory|View|Application
    {
        $user = Auth::user();

        $services = $user->services()->paginate(5);
        return view('service.index',compact('services'));
    }
    public function create(): Factory|View|Application
    {
        return view('service.create');
    }
    public function store(ServiceRequest $request): RedirectResponse
    {
        Service::create($request->validated() + ['user_id'=>Auth::id()]);
        return redirect('service')->with('msg','service added successfully');

    }
    public function edit(Service $service): Factory|View|Application
    {
        return view('service.edit',compact('service'));
    }

    public function update(ServiceRequest $request,Service $service): Redirector|Application|RedirectResponse
    {
        $data = $request->validated();
        $service->update($data);

        return redirect('service')->with('msg','service updated successfully');

    }
}
