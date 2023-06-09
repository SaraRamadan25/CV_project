<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ServiceController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $services = Service::with('user:id')->get()->paginate(10);
        return ServiceResource::collection($services);
    }

    public function store(ServiceRequest $request): Response
    {
        $service = Service::create($request->validated());
        return response($service, 201);
    }

    #[Pure] public function show(Service $service): ServiceResource
    {
        $service->load('user:id');
        return new ServiceResource($service);
    }

    public function update(ServiceRequest $request, Service $service): ServiceResource
    {
         $service->update($request->validated());
        return new ServiceResource($service);
    }

    public function destroy(Service $service): JsonResponse
    {
        $service->delete();
        return response()->json(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
