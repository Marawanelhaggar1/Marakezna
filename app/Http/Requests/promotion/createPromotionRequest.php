<?php

namespace App\Http\Requests\promotion;

use App\Models\Promotion;
use Illuminate\Foundation\Http\FormRequest;

class createPromotionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return
            auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'titleAr' => 'required',
            'description' => 'required',
            'descriptionAr' => 'required',
        ];
    }

    public function getImage1Path(): string
    {
        return $this->file('image1')->store('promotion', 'public');
    }

    public function getImage2Path(): string
    {
        return $this->file('image2')->store('promotion', 'public');
    }

    public function createPromotion(): Promotion
    {
        return Promotion::create([
            'title' => $this->title,
            'titleAr' => $this->titleAr,
            'description' => $this->description,
            'descriptionAr' => $this->descriptionAr,
            'image1' => $this->getImage1Path(),
            'image2' => $this->getImage2Path()
        ]);
    }
}
