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
            'paragraph1' => 'required',
            'paragraph1Ar' => 'required',
            'paragraph2' => 'nullable',
            'paragraph2Ar' => 'nullable',
        ];
    }

    public function getImagePath(): string
    {
        return $this->file('image')->store('aboutUs_images', 'public');
    }

    public function updateAboutUs(): AboutUs
    {
        $about = AboutUs::findOrFail($this->id);

        $about->update([
            'id' => $this->id,
            'image' => $this->getImagePath(),
            'paragraph1Ar' => $this->paragraph1Ar,
            'paragraph2Ar' => $this->paragraph2Ar,
            'paragraph1' => $this->paragraph1,
            'paragraph2' => $this->paragraph2,

        ]);

        return $about;
    }
}
