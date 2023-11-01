<?php

namespace App\Http\Controllers;

use App\Http\Requests\specialization\createSpecializationRequest;
use App\Http\Requests\specialization\updateSpecializationRequest;
use App\Http\Resources\specializationResource;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index()
    {
        $specializations = Specialization::all();
        return specializationResource::collection($specializations);
    }

    public function getById($id)
    {
        $specialization = Specialization::find($id);
        return new specializationResource($specialization);
    }

    public function create(createSpecializationRequest $request)
    {
        $specialization = $request->createSpecialization();
        return new specializationResource($specialization);
    }

    public function update(updateSpecializationRequest $request)
    {
        $specialization = $request->updateSpecialization();
        return new specializationResource($specialization);
    }

    public function delete($id)
    {
        $specialization = Specialization::find($id);
        $specialization->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted specialization'
        ]);
    }
}
