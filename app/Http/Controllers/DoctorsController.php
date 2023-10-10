<?php

namespace App\Http\Controllers;

use App\Http\Requests\doctors\createDoctorRequest;
use App\Http\Requests\doctors\updateDoctorRequest;
use App\Http\Resources\doctorsResource;
use App\Models\Doctors;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function index(){
        $doctor = Doctors::all();
        return doctorsResource::collection($doctor);
    }

    public function create(createDoctorRequest $request){
        $doctor=$request->createDoctor();
        return new doctorsResource($doctor);
    }

    public function update(updateDoctorRequest $request){
        $doctor=$request->updateDoctor();
        return new doctorsResource($doctor);
    }

    public function delete($id){
        $doctor=Doctors::find($id);
        $doctor->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted health Center'
        ]);
    }
}
