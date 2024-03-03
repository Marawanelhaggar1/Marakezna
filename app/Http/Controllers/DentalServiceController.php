<?php

namespace App\Http\Controllers;

use App\Http\Requests\DentalService\createDentalServiceRequest;
use App\Http\Requests\DentalService\updateDentalServiceRequest;
use App\Http\Resources\dentalServiceResource;
use App\Models\DentalService;
use Illuminate\Http\Request;

class DentalServiceController extends Controller
{
    public function index()
    {
        $contacts = DentalService::all();
        return dentalServiceResource::collection($contacts);
    }

    public function getById($id)
    {
        $contact = DentalService::find($id);
        return new dentalServiceResource($contact);
    }

    public function create(createDentalServiceRequest $request)
    {
        $contacts = $request->createDentalService();
        return new dentalServiceResource($contacts);
    }

    public function update(updateDentalServiceRequest $request)
    {
        $settings = $request->updateDentalService();
        return new dentalServiceResource($settings);
    }

    public function delete($id)
    {
        $contact = DentalService::find($id);
        $contact->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted contact'
        ]);
    }
}
