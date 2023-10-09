<?php

namespace App\Http\Controllers;

use App\Http\Requests\servicesGroup\createServicesGroupRequest;
use App\Http\Requests\servicesGroup\updateServicesGroupRequest;
use App\Http\Resources\servicesGroupResource;
use App\Models\ServiceGroup;
use Illuminate\Http\Request;

class ServiceGroupController extends Controller
{
    public function index(){
        $services=ServiceGroup::all();
        return servicesGroupResource::collection($services);
    }

     public function create(createServicesGroupRequest $request){
        $services=$request->createServiceGroup();
        return new servicesGroupResource($services);
    }

    public function update(updateServicesGroupRequest $request){
        $services=$request->updateServiceGroup();
        return new servicesGroupResource($services);
    }

    public function delete($id)
    {
        $service=ServiceGroup::find($id);
        $service->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted service'
        ]);
    }
}
