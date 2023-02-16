<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{


    public function create(){
/*        $categories = Category::all();*/
        $categories =['photoshop','illustrator','indesign','artworks'];
        return view('projects.create',compact('categories'));
    }

}
