<?php

namespace App\Http\Controllers;

use App\Http\Requests\mobileSetting\createMobileSettingRequest;
use App\Http\Requests\mobileSetting\updateMobileSettingRequest;
use App\Http\Resources\mobileSettingResource;
use App\Models\MobileSetting;
use Illuminate\Http\Request;

class MobileSettingController extends Controller
{
    public function index()
    {
        $settings = MobileSetting::all();
        return mobileSettingResource::collection($settings);
    }

    public function getById($id)
    {
        $setting = MobileSetting::find($id);
        return new mobileSettingResource($setting);
    }

    public function create(createMobileSettingRequest $request)
    {
        $settings = $request->createMobileSetting();
        return new mobileSettingResource($settings);
    }

    public function update(updateMobileSettingRequest $request)
    {
        $settings = $request->updateMobileSetting();
        return new mobileSettingResource($settings);
    }

    public function delete($id)
    {
        $setting = MobileSetting::find($id);
        $setting->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted setting'
        ]);
    }
}
