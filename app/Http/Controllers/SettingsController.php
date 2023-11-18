<?php

namespace App\Http\Controllers;

use App\Http\Requests\settings\createSettingRequest;
use App\Http\Requests\settings\updateSettingRequest;
use App\Http\Resources\settingResource;
use App\Models\Settings;
use App\Models\Slide;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::all();
        return settingResource::collection($settings);
    }

    public function getById($id)
    {
        $setting = Settings::find($id);
        return new settingResource($setting);
    }

    public function create(createSettingRequest $request)
    {
        $settings = $request->createSetting();
        return new settingResource($settings);
    }

    public function update(updateSettingRequest $request)
    {
        $settings = $request->updateSetting();
        return new settingResource($settings);
    }

    public function delete($id)
    {
        $setting = Settings::find($id);
        $setting->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted setting'
        ]);
    }
}
