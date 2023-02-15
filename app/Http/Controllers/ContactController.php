<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }
    public function create(): Factory|View|Application
    {
        return view('contact.create');
    }
    public function store(Request $request): Redirector|Application|RedirectResponse
    {
        $request = request()->validate([
            'name'=>'required|min:3',
            'email'=>'required|email',
            'title'=>'required|max:255',
            'message'=>'required'
        ]);

        $attributes = Contact::create([
            'name'=> $request['name'],
            'email'=> $request['email'],
            'title'=> $request['title'],
            'message'=> $request['message'],

        ]);
        return redirect('/index');
    }
}
