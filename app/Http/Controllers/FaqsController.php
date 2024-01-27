<?php

namespace App\Http\Controllers;

use App\Http\Requests\faqs\createFaqsRequest;
use App\Http\Requests\faqs\upateFaqsRequest;
use App\Http\Resources\faqsResources;
use App\Models\Faqs;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index()
    {
        $faqs = Faqs::all();
        return faqsResources::collection($faqs);
    }

    public function getById($id)
    {
        $faqs = Faqs::find($id);
        return new faqsResources($faqs);
    }

    public function create(createFaqsRequest $request)
    {
        $faqs = $request->createFaqs();
        return new faqsResources($faqs);
    }

    public function update(upateFaqsRequest $request)
    {
        $faqs = $request->updateFaqs();
        return new faqsResources($faqs);
    }

    public function delete($id)
    {
        $faqs = Faqs::find($id);
        $faqs->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted Question'
        ]);
    }
}
