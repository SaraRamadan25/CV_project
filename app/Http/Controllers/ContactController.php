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
           Contact::create($request->validated());
        return redirect('contact.create');
    }

    // admin routes
    public function index(): Factory|View|Application
    {
        $contacts = Contact::paginate(5);
        return view('contact.index',compact('contacts'));
    }

    public function show(Contact $contact): Factory|View|Application
    {
        return view('contact.show',compact('contact'));
    }

    public function destroy(Contact $contact): Redirector|Application|RedirectResponse
    {
        $contact->delete();
        return redirect()->route('contact.index')->with('msg', 'Contact deleted successfully');
    }
}
