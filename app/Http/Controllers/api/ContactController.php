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

    public function update(ContactRequest $request, Contact $contact): JsonResponse
    {
         $contact->update($request->validated());
        return response()->json(['message' => 'Contact updated successfully']);
    }

}
