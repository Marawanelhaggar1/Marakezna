<?php

namespace App\Http\Requests\DentalService;

use App\Models\DentalService;
use Illuminate\Foundation\Http\FormRequest;

class createDentalServiceRequest extends FormRequest
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
            'title' => 'required',
            'titleAr' => 'required',
            'description' => 'required',
            'descriptionAr' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function getImagePath(): string
    {
        return $this->file('image')->store('dental_service', 'public');
    }

    public function createDentalService(): DentalService
    {
        return DentalService::create([
            'title' => $this->title,
            'titleAr' => $this->titleAr,
            'description' => $this->description,
            'descriptionAr' => $this->descriptionAr,
            'image' => $this->getImagePath()

        ]);
    }
}
