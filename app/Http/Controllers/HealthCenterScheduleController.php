<?php

namespace App\Http\Controllers;

use App\Models\HealthCenterSchedule;
use Illuminate\Http\Request;

class HealthCenterScheduleController extends Controller
{
    public function index()
    {
        // Retrieve all doctor schedules
        $centerSchedules = HealthCenterSchedule::all();

        return response()->json($centerSchedules);
    }

    public function create(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'center_id' => 'required|exists:health_centers,id',
            'date' => 'required|date',
            'dateAr' => 'required',
            'start_timeAr' => 'required',
            'end_timeAr' => 'required',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        // Create a new doctor schedule
        $centerSchedule = HealthCenterSchedule::create($request->all());

        return response()->json($centerSchedule, 201);
    }

    public function show($id)
    {
        // Retrieve a single doctor schedule
        $centerSchedule = HealthCenterSchedule::findOrFail($id);

        return response()->json($centerSchedule);
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'center_id' => 'exists:health_centers,id',
            'date' => 'date',
            'dateAr' => 'required',
            'start_timeAr' => 'required',
            'end_timeAr' => 'required',
            'start_time' => 'date_format:H:i',
            'end_time' => 'date_format:H:i|after:start_time',
        ]);

        // Find the doctor schedule and update it
        $centerSchedule = HealthCenterSchedule::findOrFail($id);
        $centerSchedule->update($request->all());

        return response()->json($centerSchedule);
    }

    public function destroy($id)
    {
        // Find the doctor schedule and delete it
        $centerSchedule = HealthCenterSchedule::findOrFail($id);
        $centerSchedule->delete();

        return response()->json(null, 204);
    }

    public function getSchedulesByCenter($centerId)
    {
        // Retrieve all schedules for the specified doctor ID
        $centerSchedules = HealthCenterSchedule::where('center_id', $centerId)->get();

        return response()->json($centerSchedules);
    }
}
