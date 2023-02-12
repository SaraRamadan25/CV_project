<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('work',compact('categories'));
    }
}
