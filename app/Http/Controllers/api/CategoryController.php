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
        $categories = Category::paginate(4);
        return CategoryResource::collection($categories);
    }

    #[Pure] public function show(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }

    public function create(): Response|Application|ResponseFactory
    {
        if (auth()->user()?->name == 'admin') {
            return response('category created successfully', 201);
        }
        return response('Not Allowed', 403);
    }

    public function store(Request $request): JsonResponse
    {
        if (auth()->user()?->name == 'admin') {
            $data = $request->validate([
                'name' => 'required',
            ]);
            Category::create($data);
            return response()->json(['msg' => 'category created successfully'], 201);
        }
        return response()->json(['msg' => 'Not Allowed'], 403);
    }


    public function update(Request $request, Category $category): JsonResponse
    {
        {
            $data = $request->validate([
                'name' => 'required',
            ]);

            $category->update($data);
            return response()->json(['msg' => 'category updated successfully'], 200);
        }
    }

    public function destroy(Category $category): JsonResponse
    {
        $category->projects()->delete();
        $category->delete();
        return response()->json(['msg' => 'category & its projects deleted successfully'], 200);
    }
}
