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





}
