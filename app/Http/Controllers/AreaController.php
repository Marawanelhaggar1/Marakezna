<?php

namespace App\Http\Controllers;

use App\Http\Requests\area\createAreaRequest;
use App\Http\Resources\AreaResource;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return AreaResource::collection($areas);
    }

    public function getById($id)
    {
        $area = Area::find($id);
        return new AreaResource($area);
    }

    public function create(createAreaRequest $request)
    {
        $areas = $request->createArea();
        return new AreaResource($areas);
    }


    public function delete($id)
    {
        $area = Area::find($id);
        $area->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted area'
        ]);
    }

    public function search(Request $request)
    {
        $items = [];
        $search = $request->input('search');
        $locale = app()->getLocale();

        if ($locale == 'Ar') {
            $area = Area::where('nameAr', 'like', '%' . $search . '%')->get();
        } else {
            $area = Area::where('nameEn', 'like', '%' . $search . '%')->get();
        }

        $items = AreaResource::collection($area);

        return $items;
    }
}
