<?php

namespace App\Http\Controllers;

use App\Http\Requests\career\createCareerRequest;
use App\Http\Requests\career\updateCareerRequest;
use App\Http\Resources\careerResource;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $contacts = Career::all();
        return careerResource::collection($contacts);
    }

    public function getById($id)
    {
        $contact = Career::find($id);
        return new careerResource($contact);
    }

    public function create(createCareerRequest $request)
    {
        $contacts = $request->createCareer();
        return new careerResource($contacts);
    }

    public function update(updateCareerRequest $request)
    {
        $settings = $request->updateCareer();
        return new careerResource($settings);
    }

    public function delete($id)
    {
        $contact = Career::find($id);
        $contact->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted Career'
        ]);
    }
}
