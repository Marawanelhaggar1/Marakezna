<?php

namespace App\Http\Requests\faqs;

use App\Models\Faqs;
use Illuminate\Foundation\Http\FormRequest;

class upateFaqsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|exists:faqs,id',
            'question' => 'required|unique:faqs,question,' . $this->id,
            'questionAr' => 'required|unique:faqs,questionAr,' . $this->id,
            'answer' => 'required',
            'answerAr' => 'required',
        ];
    }

    public function updateFaqs(): Faqs
    {
        $faqs = Faqs::findOrFail($this->id);
        $faqs->update([
            'id' => $this->id,
            'question' => $this->question,
            'questionAr' => $this->questionAr,
            'answer' => $this->answer,
            'answerAr' => $this->answerAr,
        ]);

        return $faqs;
    }
}
