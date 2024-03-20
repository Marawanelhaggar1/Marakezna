<?php

namespace App\Http\Requests\healthCenter;

use App\Models\HealthCenter;
use Illuminate\Foundation\Http\FormRequest;

class updateHealthCenterRequest extends FormRequest
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
            'id' => 'required|exists:health_centers,id',
            'nameEn' => 'required|unique:health_centers,nameEn,' . $this->id,
            'nameAr' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'addressAr' => 'required',
            'description1' => 'required',
            'description1Ar' => 'required',
            'area_id' => 'required|array',  // Assuming you are passing an array of area_ids
            'area_id.*' => 'exists:areas,id',
            'sub_area_id' => 'required|array',  // Assuming you are passing an array of sub_area_ids
            'sub_area_id.*' => 'exists:sub_areas,id',
            'scan' => 'required|boolean',
            'lab' => 'required|boolean',
            'phone' => 'required',
            'whatsAppLink' => 'required',
            'description2' => 'nullable',
            'description2Ar' => 'nullable',
            'view' => 'required',

        ];
    }

    public function getImagePath(): string
    {
        $icon = HealthCenter::findOrFail($this->id);

        if ($this->hasFile('image')) {
            // Use the store() method to store the image
            return $this->file('image')->store('center_images', 'public');
        } else {
            return $icon->image;
        }
    }

    public function getLogoPath(): string
    {
        $icon = HealthCenter::findOrFail($this->id);

        if ($this->hasFile('logo')) {
            // Use the store() method to store the logo
            return $this->file('logo')->store('center_images', 'public');
        } else {
            return $icon->logo;
        }
    }

    public function updateHealthCenter(): HealthCenter
    {
        $health = HealthCenter::findOrFail($this->id);
        $health->update([
            'id' => $this->id,
            'nameEn' => $this->nameEn,
            'nameAr' => $this->nameAr,
            'address' => $this->address,
            'image' => $this->getImagePath(),
            'logo' => $this->getLogoPath(),
            'addressAr' => $this->addressAr,
            'description1' => $this->description1,
            'description1Ar' => $this->description1Ar,
            'description2' => $this->description2,
            'description2Ar' => $this->description2Ar,
            'scan' => $this->scan,
            'lab' => $this->lab,
            'phone' => $this->phone,
            'whatsAppLink' => $this->whatsAppLink,
            'view' => $this->view,


        ]);

        $health->areas()->sync($this->input('area_id'));
        $health->subAreas()->sync($this->input('sub_area_id'));


        return $health;
    }
}
