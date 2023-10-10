<?php

namespace App\Http\Controllers;

use App\Http\Requests\patients\createPatientRequest;
use App\Http\Requests\patients\updatePatientRequest;
use App\Http\Resources\patientsResource;
use App\Models\Patients;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index(){
        $patients = Patients::all();
        return patientsResource::collection($patients);
    }

    public function create(createPatientRequest $request){
        $patient=$request->createPatient();
        return new patientsResource($patient);
    }

    public function update(updatePatientRequest $request){
        $patient=$request->updatePatient();
        return new patientsResource($patient);
    }

    public function delete($id){
        $patient=Patients::find($id);
        $patient->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted health Center'
        ]);
    }
}
