<?php

namespace App\Http\Requests\DentalService;

use App\Models\DentalService;
use Illuminate\Foundation\Http\FormRequest;

class updateDentalServiceRequest extends FormRequest
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
            'id' => 'required|exists:dental_services,id',
            'title' => 'required',
            'titleAr' => 'required',
            'description' => 'required',
            'descriptionAr' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function getImagePath(): string
    {
        $dental = DentalService::findOrFail($this->id);

        if ($this->hasFile('image')) {
            // Use the store() method to store the image
            return $this->file('image')->store('dental_service', 'public');
        } else {
            return $dental->image;
        }
    }

    public function updateDentalService(): DentalService
    {
        $dental = DentalService::findOrFail($this->id);

        $dental->update([
            'id' => $this->id,
            'title' => $this->title,
            'titleAr' => $this->titleAr,
            'description' => $this->description,
            'descriptionAr' => $this->descriptionAr,
            'image' => $this->getImagePath()
        ]);

        return $dental;
    }
}
