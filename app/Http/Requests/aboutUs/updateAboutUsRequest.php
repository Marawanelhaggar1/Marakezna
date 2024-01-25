<?php

namespace App\Http\Requests\aboutUs;

use App\Models\AboutUs;
use Illuminate\Foundation\Http\FormRequest;

class updateAboutUsRequest extends FormRequest
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
            'id' => 'required|exists:about_us,id',
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
        $about = AboutUs::findOrFail($this->id);

        if ($this->hasFile('image')) {
            // Use the store() method to store the image
            return $this->file('image')->store('aboutUs', 'public');
        } else {
            return $about->image;
        }
    }

    public function updateAboutUs(): AboutUs
    {
        $about = AboutUs::findOrFail($this->id);

        $about->update([
            'id' => $this->id,
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
            'videoLink' => $this->videoLink, 'image' => $this->getImagePath(),


        ]);

        return $about;
    }
}
