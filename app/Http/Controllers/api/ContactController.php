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
use JetBrains\PhpStorm\Pure;

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

    #[Pure] public function show(Contact $contact): ContactResource
    {
        return new ContactResource($contact);
    }

    public function update(ContactRequest $request, Contact $contact): ContactResource
    {
         $contact->update($request->all());
         return new ContactResource($contact);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
    }
}
