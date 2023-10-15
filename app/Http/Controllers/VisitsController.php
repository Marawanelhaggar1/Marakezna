<?php

namespace App\Http\Controllers;

use App\Http\Requests\visits\createVisitsRequest;
use App\Http\Requests\visits\updateVisitsRequest;
use App\Http\Resources\visitsResource;
use App\Models\Visits;
use Illuminate\Http\Request;

class VisitsController extends Controller
{
    public function index()
    {
        $visits = Visits::all();
        return visitsResource::collection($visits);
    }

    public function getById($id)
    {
        $visit = Visits::find($id);
        return new visitsResource($visit);
    }

    public function create(createVisitsRequest $request)
    {
        $visits = $request->createVisits();
        return new visitsResource($visits);
    }

    public function update(updateVisitsRequest $request)
    {
        $visits = $request->updateVisits();
        return new visitsResource($visits);
    }

    public function delete($id)
    {
        $visit = Visits::find($id);
        $visit->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted visit'
        ]);
    }
}
