<?php

namespace App\Http\Controllers;

use App\Http\Requests\pics\createPicsReqeust;
use App\Http\Resources\picsResource;
use App\Models\Pics;
use Illuminate\Http\Request;

class PicsController extends Controller
{
    public function index()
    {
        $slides = Pics::all();
        return picsResource::collection($slides);
    }

    public function getById($id)
    {
        $slide = Pics::find($id);
        return new picsResource($slide);
    }

    public function create(createPicsReqeust $request)
    {
        $slides = $request->createPic();
        return new picsResource($slides);
    }



    public function delete($id)
    {
        $slide = Pics::find($id);
        $slide->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted slide'
        ]);
    }
}
