<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ContactController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return ContactResource::collection(Contact::all());
    }

    public function store(ContactRequest $request): Contact
    {
        return Contact::create($request->all());
    }

    public function show(Contact $contact): Contact
    {
        return $contact;
    }

    public function update(ContactRequest $request, Contact $contact): Contact
    {
         $contact->update($request->all());
            return $contact;
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
    }
}
