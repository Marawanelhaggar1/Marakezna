<?php

namespace App\Http\Controllers;

use App\Http\Requests\feedback\createFeedbackRequest;
use App\Http\Requests\feedback\createFeedbackResource;
use App\Http\Resources\feedbackResource;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $slides = Feedback::all();
        return feedbackResource::collection($slides);
    }

    public function getById($id)
    {
        $slide = Feedback::find($id);
        return new feedbackResource($slide);
    }

    public function create(createFeedbackRequest $request)
    {
        $slides = $request->createFeedback();
        return new feedbackResource($slides);
    }



    public function delete($id)
    {
        $slide = Feedback::find($id);
        $slide->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted slide'
        ]);
    }
}
