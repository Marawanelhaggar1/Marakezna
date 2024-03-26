<?php

namespace App\Http\Controllers;

use App\Http\Requests\subArea\createSubAreaRequest;
use App\Http\Requests\subArea\updateSubAreaRequest;
use App\Http\Resources\subAreaResource;
use App\Models\SubArea;
use Illuminate\Http\Request;

class SubAreaController extends Controller
{
    public function index()
    {
        $subAreas = SubArea::all();
        return subAreaResource::collection($subAreas);
    }

    public function getById($id)
    {
        $subArea = SubArea::find($id);
        return new subAreaResource($subArea);
    }

    public function getByArea($id)
    {
        $subArea = SubArea::where('area_id', $id)->get();
        return subAreaResource::collection($subArea);
    }

    public function create(createSubAreaRequest $request)
    {
        $subAreas = $request->createSubArea();
        return new subAreaResource($subAreas);
    }

    public function update(updateSubAreaRequest $request)
    {
        $subAreas = $request->updateSubArea();
        return new subAreaResource($subAreas);
    }

    public function delete($id)
    {
        $subArea = SubArea::find($id);
        $subArea->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted Sub Area'
        ]);
    }
}
