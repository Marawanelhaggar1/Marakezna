<?php

namespace App\Http\Requests\aboutUs;

use App\Models\AboutUs;
use Illuminate\Foundation\Http\FormRequest;

class createAboutUsRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'paragraph' => 'required',
            'paragraphAr' => 'required',
            'title' => 'required',
            'titleAr' => 'required',
            'mission' => 'required',
            'missionAr' => 'required',
            'vision' => 'required',
            'visionAr' => 'required',
            'values' => 'required',
            'valuesAr' => 'required',
            'videoLink' => 'nullable',
        ];
    }

    public function getImagePath(): string
    {
        return $this->file('image')->store('aboutUs_images', 'public');
    }

    public function createAboutUs(): AboutUs
    {
        return AboutUs::create([
            'image' => $this->getImagePath(),
            'title' => $this->title,
            'titleAr' => $this->titleAr,
            'paragraph' => $this->paragraph,
            'paragraphAr' => $this->paragraphAr,
            'vision' => $this->vision,
            'visionAr' => $this->visionAr,
            'mission' => $this->mission,
            'missionAr' => $this->missionAr,
            'values' => $this->values,
            'valuesAr' => $this->valuesAr,
            'videoLink' => $this->videoLink,
        ]);
    }
}
