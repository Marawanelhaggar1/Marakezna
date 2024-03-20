<?php

namespace App\Http\Controllers;

use App\Http\Resources\doctorSchedualeResources;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function index()
    {
        // Retrieve all doctor schedules
        $doctorSchedules = DoctorSchedule::all();
        return doctorSchedualeResources::collection($doctorSchedules);
    }
    public function create(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'center_id' => 'required|exists:health_centers,id',
            'date' => 'required',
            'dateAr' => 'required',
            'start_timeAr' => 'required',
            'end_timeAr' => 'required',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        // Create a new doctor schedule
        $doctorSchedule = DoctorSchedule::create($request->all());

        return response()->json($doctorSchedule, 201);
    }

    public function show($id)
    {
        // Retrieve a single doctor schedule
        $doctorSchedule = DoctorSchedule::findOrFail($id);

        return new doctorSchedualeResources($doctorSchedule);
    }

    public function getSchedulesByDoctor($doctorId)
    {
        // Retrieve all schedules for the specified doctor ID
        $doctorSchedules = DoctorSchedule::where('doctor_id', $doctorId)->get();

        return doctorSchedualeResources::collection($doctorSchedules);
    }


    public function update(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'doctor_id' => 'exists:doctors,id',
            'id' => 'required|exists:doctor_schedules,id',
            'center_id' => 'required|exists:health_centers,id',
            'date' => 'required',
            'dateAr' => 'required',
            'start_timeAr' => 'required',
            'end_timeAr' => 'required',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        // Find the doctor schedule and update it
        $doctorSchedule = DoctorSchedule::findOrFail($request->id);
        $doctorSchedule->update($request->all());

        return response()->json($doctorSchedule);
    }

    public function destroy($id)
    {
        // Find the doctor schedule and delete it
        $doctorSchedule = DoctorSchedule::findOrFail($id);
        $doctorSchedule->delete();

        return response()->json(null, 204);
    }
}
