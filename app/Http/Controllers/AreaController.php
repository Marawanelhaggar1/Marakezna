<?php

namespace App\Http\Controllers;

use App\Http\Requests\area\createAreaRequest;
use App\Http\Requests\area\updateAreaRequest;
use App\Http\Resources\AreaResource;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::where('view', null)->orWhere('view', 1)->get();
        return AreaResource::collection($areas);
    }

    public function getForAdmin()
    {
        $healthCenter = Area::all();
        return AreaResource::collection($healthCenter);
    }

    public function update(updateAreaRequest $request)
    {
        $booking = $request->updateArea();
        return new AreaResource($booking);
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
