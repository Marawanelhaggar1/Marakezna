<?php

namespace App\Http\Controllers;

use App\Http\Requests\healthCenter\createHealthCenterRequest;
use App\Http\Requests\healthCenter\updateHealthCenterRequest;
use App\Http\Resources\healthCenterResource;
use App\Models\Area;
use App\Models\HealthCenter;
use Illuminate\Http\Request;

class HealthCenterController extends Controller
{
    public function index()
    {
        $healthCenter = HealthCenter::where('view', null)->orWhere('view', 1)->get();
        return healthCenterResource::collection($healthCenter);
    }

    public function getForAdmin()
    {
        $healthCenter = HealthCenter::all();
        return healthCenterResource::collection($healthCenter);
    }

    public function getById($id)
    {
        $healthCenter = HealthCenter::find($id);
        return new healthCenterResource($healthCenter);
    }

    public function create(createHealthCenterRequest   $request,)
    {
        $healthCenter = $request->createHealthCenter();
        // return response()->json([
        //     'message' => 'success',
        //     'data' => $healthCenter, 'pivot_column' => $this->pivot->pivot_column,
        // ]);
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

    public function getByArea($id)
    {
        $center =
            HealthCenter::whereHas('areas', function ($query) use ($id) {
                $query->where('areas.id', $id);
            })->get();
        return healthCenterResource::collection($center);
    }

    public function getBySubArea($id)
    {
        $center =
            HealthCenter::whereHas('subAreas', function ($query) use ($id) {
                $query->where('sub_areas.id', $id);
            })->get();
        return healthCenterResource::collection($center);
    }
    public function getScansOrLabs()
    {
        $healthCenter = HealthCenter::where(function ($query) {
            $query->where('scan', true)
                ->orWhere('lab', true);
        })->where(function ($query) {
            $query->where('view', null)
                ->orWhere('view', 1);
        })->get();
        return healthCenterResource::collection($healthCenter);
    }
    public function getLabs()
    {
        $center = HealthCenter::Where('lab', true)->get();
        return healthCenterResource::collection($center);
    }

    public function getScans()
    {

        $center = HealthCenter::Where('scan', true)->get();
        return healthCenterResource::collection($center);
    }

    public function getLabsByArea($id)
    {
        $center = HealthCenter::where('lab', true)->whereHas('areas', function ($query) use ($id) {
            $query->where('areas.id', $id);
        })->get();

        return HealthCenterResource::collection($center);
    }

    public function getLabsBySubArea($id)
    {
        $center = HealthCenter::where('lab', true)->whereHas('subAreas', function ($query) use ($id) {
            $query->where('sub_areas.id', $id);
        })->get();

        return HealthCenterResource::collection($center);
    }

    public function getScansByArea($id)
    {
        $center = HealthCenter::where('scan', true)->whereHas('areas', function ($query) use ($id) {
            $query->where('areas.id', $id);
        })->get();

        return HealthCenterResource::collection($center);
    }
    public function getScansBySubArea($id)
    {
        $center = HealthCenter::where('scan', true)->whereHas('subAreas', function ($query) use ($id) {
            $query->where('sub_areas.id', $id);
        })->get();

        return HealthCenterResource::collection($center);
    }
}
