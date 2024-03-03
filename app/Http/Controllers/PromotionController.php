<?php

namespace App\Http\Controllers;

use App\Http\Requests\promotion\createPromotionRequest;
use App\Http\Requests\promotion\updatePromotionRequest;
use App\Http\Resources\promotionResource;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $contacts = Promotion::all();
        return promotionResource::collection($contacts);
    }

    public function getById($id)
    {
        $contact = Promotion::find($id);
        return new promotionResource($contact);
    }

    public function create(createPromotionRequest $request)
    {
        $contacts = $request->createPromotion();
        return new promotionResource($contacts);
    }

    public function update(updatePromotionRequest $request)
    {
        $settings = $request->updatePromotion();
        return new promotionResource($settings);
    }

    public function delete($id)
    {
        $contact = Promotion::find($id);
        $contact->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted Promotion'
        ]);
    }
}
