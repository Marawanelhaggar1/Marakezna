<?php

namespace App\Http\Controllers;

use App\Http\Requests\doctorCalls\createDoctorCallsRequest;
use App\Http\Requests\doctorCalls\updateDoctorCallsRequest;
use App\Http\Resources\doctorCallsResource;
use App\Models\DoctorCalls;
use Illuminate\Http\Request;

class DoctorCallsController extends Controller
{
    public function index()
    {
        $contacts = DoctorCalls::all();
        return doctorCallsResource::collection($contacts);
    }

    public function getById($id)
    {
        $contact = DoctorCalls::find($id);
        return new doctorCallsResource($contact);
    }

    public function create(createDoctorCallsRequest $request)
    {
        $contacts = $request->RequestACall();
        return new doctorCallsResource($contacts);
    }

    public function update(updateDoctorCallsRequest $request)
    {
        $booking = $request->updateDoctorCall();
        return new doctorCallsResource($booking);
    }

    public function delete($id)
    {
        $contact = DoctorCalls::find($id);
        $contact->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted contact'
        ]);
    }
}
