<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use JetBrains\PhpStorm\Pure;

class CategoryController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return CategoryResource::collection(Category::all());
    }


    public function store(Request $request): Response|Application|ResponseFactory
    {
        return response(Category::create([
            'name' => $request['name'],
        ]), 200);

    }


    #[Pure] public function show(Category $category): CategoryResource
    {
         return new CategoryResource($category);

    }


    public function update(Request $request, Category $category): JsonResponse
    {
        $category->update($request->all());
        return response()->json(['message' => 'Category updated successfully'], 200);
    }

    public function destroy(Category $category): JsonResponse
    {
        $category->projects()->delete();
        $category->delete();

        return response()->json(['message' => 'Category & its related projects deleted successfully'], 200);
    }

}
