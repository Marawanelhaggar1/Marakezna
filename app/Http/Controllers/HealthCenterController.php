<?php

namespace App\Http\Controllers;

use App\Http\Requests\healthCenter\createHealthCenterRequest;
use App\Http\Requests\healthCenter\updateHealthCenterRequest;
use App\Http\Resources\healthCenterResource;
use App\Models\HealthCenter;
use Illuminate\Http\Request;

class HealthCenterController extends Controller
{
    public function index()
    {
        $healthCenter = HealthCenter::all();
        return healthCenterResource::collection($healthCenter);
    }

    public function getById($id)
    {
        $healthCenter = HealthCenter::find($id);
        return new healthCenterResource($healthCenter);
    }

    public function create(createHealthCenterRequest $request)
    {
        $healthCenter = $request->createHealthCenter();
        return new healthCenterResource($healthCenter);
    }

    public function update(updateHealthCenterRequest $request)
    {
        $healthCenter = $request->updateHealthCenter();
        return new healthCenterResource($healthCenter);
    }

    public function delete($id)
    {
        $healthCenter = HealthCenter::find($id);
        $healthCenter->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted health Center'
        ]);
    }
}
