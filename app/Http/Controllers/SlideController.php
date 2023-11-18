<?php

namespace App\Http\Controllers;

use App\Http\Requests\slides\createSlideRequest;
use App\Http\Requests\slides\updateSlideRequest;
use App\Http\Resources\slideResource;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        return slideResource::collection($slides);
    }

    public function getById($id)
    {
        $slide = Slide::find($id);
        return new slideResource($slide);
    }

    public function create(createSlideRequest $request)
    {
        $slides = $request->createSlide();
        return new slideResource($slides);
    }

    public function update(updateSlideRequest $request)
    {
        $slides = $request->updateSlide();
        return new slideResource($slides);
    }

    public function delete($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted slide'
        ]);
    }
}
