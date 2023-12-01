<?php

namespace App\Http\Controllers;

use App\Http\Requests\insurance\createInsuranceRequest;
use App\Http\Requests\insurance\updateInsuranceRequest;
use App\Http\Resources\insuranceResource;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function index()
    {
        $insurances = Insurance::all();
        return insuranceResource::collection($insurances);
    }

    public function getById($id)
    {
        $insurance = insurance::find($id);
        return new insuranceResource($insurance);
    }

    public function create(createInsuranceRequest $request)
    {
        $insurances = $request->createInsurance();
        return new insuranceResource($insurances);
    }

    public function update(updateInsuranceRequest $request)
    {
        $insurances = $request->updateInsurance();
        return new insuranceResource($insurances);
    }

    public function delete($id)
    {
        $insurance = insurance::find($id);
        $insurance->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted insurance'
        ]);
    }
}
