<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class ContactController extends Controller
{

    public function create(): Factory|View|Application
    {
        return view('contact.create');
    }
    public function store(ContactRequest $request): Redirector|Application|RedirectResponse
    {
           Contact::create([
            'name'=> $request['name'],
            'email'=> $request['email'],
            'title'=> $request['title'],
            'message'=> $request['message'],

        ]);
        return redirect('contact.create');
    }
}
