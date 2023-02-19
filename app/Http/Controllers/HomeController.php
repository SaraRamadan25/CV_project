<?php

namespace App\Http\Controllers;

use App\Http\Requests\WelcomeRequest;
use App\Models\Education;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): Factory|View|Application
    {
        $user = User::query()->orderBy('created_at', 'desc')->first();

        return view('welcome.index',compact('user'));
    }


}
