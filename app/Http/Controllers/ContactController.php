<?php

namespace App\Http\Controllers;

use App\Http\Requests\contact\createContactRequest;
use App\Http\Requests\contact\createContactResource;
use App\Http\Resources\contactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return contactResource::collection($contacts);
    }

    public function getById($id)
    {
        $contact = Contact::find($id);
        return new contactResource($contact);
    }

    public function create(createContactRequest $request)
    {
        $contacts = $request->createContact();
        return new contactResource($contacts);
    }

    // public function update(updateSettingRequest $request)
    // {
    //     $settings = $request->updateSetting();
    //     return new contactResource($settings);
    // }

    public function delete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted contact'
        ]);
    }
}
