<?php

namespace App\Http\Requests\faqs;

use App\Models\Faqs;
use Illuminate\Foundation\Http\FormRequest;

class createFaqsRequest extends FormRequest
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
            'question' => 'required',
            'questionAr' => 'required',
            'answer' => 'required',
            'answerAr' => 'required',
        ];
    }

    public function createFaqs(): Faqs
    {
        return Faqs::create([
            'question' => $this->question,
            'questionAr' => $this->questionAr,
            'answer' => $this->answer,
            'answerAr' => $this->answerAr,
        ]);
    }
}
