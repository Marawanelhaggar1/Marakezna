<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebSetting\createWebSettingRequest;
use App\Http\Requests\WebSetting\updateWebSettingRequest;
use App\Http\Resources\webSettingResource;
use App\Models\WebSetting;
use Illuminate\Http\Request;

class WebSettingController extends Controller
{
    public function index()
    {
        $settings = WebSetting::all();
        return webSettingResource::collection($settings);
    }

    public function getById($id)
    {
        $setting = WebSetting::find($id);
        return new webSettingResource($setting);
    }

    public function create(createWebSettingRequest $request)
    {
        $settings = $request->createWebSetting();
        return new webSettingResource($settings);
    }

    public function update(updateWebSettingRequest $request)
    {
        $settings = $request->updateWebSetting();
        return new webSettingResource($settings);
    }

    public function delete($id)
    {
        $setting = WebSetting::find($id);
        $setting->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted setting'
        ]);
    }
}
