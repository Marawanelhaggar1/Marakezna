<?php

namespace App\Http\Controllers;

use App\Http\Requests\icons\createIconsRequest;
use App\Http\Requests\icons\upateIconsRequest;
use App\Http\Resources\iconsResources;
use App\Models\Icons;
use Illuminate\Http\Request;

class IconsController extends Controller
{
    public function index()
    {
        $faqs = Icons::all();
        return iconsResources::collection($faqs);
    }

    public function getById($id)
    {
        $faqs = Icons::find($id);
        return new iconsResources($faqs);
    }

    public function create(createIconsRequest $request)
    {
        $faqs = $request->createIcon();
        return new iconsResources($faqs);
    }

    public function update(upateIconsRequest $request)
    {
        $faqs = $request->updateIcon();
        return new iconsResources($faqs);
    }

    public function delete($id)
    {
        $faqs = Icons::find($id);
        $faqs->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted Icons'
        ]);
    }
}
