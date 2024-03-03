<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewEmployee\createNewEmployeeRequest;
use App\Http\Requests\NewEmployee\updateNewEmployeeRequest;
use App\Http\Resources\newEmployeeResource;
use App\Models\NewEmployees;
use Illuminate\Http\Request;

class NewEmployeesController extends Controller
{
    public function index()
    {
        $contacts = NewEmployees::all();
        return newEmployeeResource::collection($contacts);
    }

    public function getById($id)
    {
        $contact = NewEmployees::find($id);
        return new newEmployeeResource($contact);
    }

    public function create(createNewEmployeeRequest $request)
    {
        $contacts = $request->createNewEmployee();
        return new newEmployeeResource($contacts);
    }

    public function update(updateNewEmployeeRequest $request)
    {
        $settings = $request->updateNewEmployee();
        return new newEmployeeResource($settings);
    }

    public function delete($id)
    {
        $contact = NewEmployees::find($id);
        $contact->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted contact'
        ]);
    }
}
