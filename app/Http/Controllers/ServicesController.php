<?php

namespace App\Http\Controllers;

use App\Http\Requests\services\createServicesRequest;
use App\Http\Requests\services\updateServicesRequest;
use App\Http\Resources\servicesResource;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        $services=Services::all();
        return servicesResource::collection($services);
    }

    public function create(createServicesRequest $request){
        $services=$request->createService();
        return new servicesResource($services);
    }

    public function update(updateServicesRequest $request){
        $services=$request->updateService();
        return new servicesResource($services);
    }

    public function delete($id)
    {
        $service=Services::find($id);
        $service->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted service'
        ]);
    }
}
