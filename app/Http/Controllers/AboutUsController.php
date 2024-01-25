<?php

namespace App\Http\Controllers;

use App\Http\Requests\aboutUs\createAboutUsRequest;
use App\Http\Requests\aboutUs\updateAboutUsRequest;
use App\Http\Resources\aboutUsResource;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::all();
        return aboutUsResource::collection($aboutUs);
    }

    public function getById($id)
    {
        $contact = AboutUs::find($id);
        return new aboutUsResource($contact);
    }

    public function create(createAboutUsRequest $request)
    {
        $aboutUs = $request->createAboutUs();
        return new aboutUsResource($aboutUs);
    }

    public function update(updateAboutUsRequest $request)
    {
        $aboutUs = $request->updateAboutUs();
        return new aboutUsResource($aboutUs);
    }

    public function delete($id)
    {
        $contact = AboutUs::find($id);
        $contact->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted About Us'
        ]);
    }
}
