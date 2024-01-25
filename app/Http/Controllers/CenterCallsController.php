<?php

namespace App\Http\Controllers;

use App\Http\Requests\centerCalls\createCenterCallsRequest;
use App\Http\Requests\centerCalls\updateCenterCallsRequest;
use App\Http\Resources\centerCallsResource;
use App\Models\CenterCalls;
use Illuminate\Http\Request;

class CenterCallsController extends Controller
{
    public function index()
    {
        $centerCalls = CenterCalls::all();
        return centerCallsResource::collection($centerCalls);
    }

    public function getById($id)
    {
        $centerCall = CenterCalls::find($id);
        return new centerCallsResource($centerCall);
    }

    public function create(createCenterCallsRequest $request)
    {
        $centerCalls = $request->createCall();
        return new centerCallsResource($centerCalls);
    }

    public function update(updateCenterCallsRequest $request)
    {
        $booking = $request->updateCall();
        return new centerCallsResource($booking);
    }

    public function delete($id)
    {
        $centerCall = CenterCalls::find($id);
        $centerCall->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted call'
        ]);
    }
}
