<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use JetBrains\PhpStorm\Pure;

class ContactController extends Controller
{

    public function store(ContactRequest $request): JsonResponse
    {
        Contact::create($request->validated());
        return response()->json(['message' => 'Contact created successfully']);
    }

    public function index(): AnonymousResourceCollection
    {
        $contacts = Contact::paginate(4);
        return ContactResource::collection($contacts);
    }

    #[Pure] public function show(Contact $contact): ContactResource
    {
        return new ContactResource($contact);
    }
    public function destroy(Contact $contact): JsonResponse
    {
        $contact->delete();
        return response()->json(['message' => 'Contact deleted successfully']);
    }


}
