<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ServiceResource::collection(Service::all());
    }

    public function store(ServiceRequest $request): Response
    {
        return Service::create($request->all());

    }

    public function show(Service $service): Service
    {
        return $service;
    }

    public function update(ServiceRequest $request, Service $service): Service
    {
         $service->update($request->all());
            return $service;
    }

    public function destroy(Service $service)
    {
        $service->delete();
    }
}
