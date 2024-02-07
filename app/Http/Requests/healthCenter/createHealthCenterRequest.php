<?php

namespace App\Http\Requests\healthCenter;

use App\Models\Area;
use App\Models\HealthCenter;
use Illuminate\Foundation\Http\FormRequest;

class createHealthCenterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return  auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nameEn' => 'required',
            'nameAr' => 'required',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'addressAr' => 'required',
            'area_id' => 'required|array',  // Assuming you are passing an array of area_ids
            'area_id.*' => 'exists:areas,id',
            'description1' => 'required',
            'description1Ar' => 'required',
            'description2' => 'nullable',
            'description2Ar' => 'nullable',
            'phone' => 'required',
            'whatsApp' => 'required',
            'scan' => 'required|boolean',
            'lab' => 'required|boolean',
            'view' => 'nullable',

        ];
    }

    public function getImagePath(): string
    {
        return $this->file('image')->store('center_images', 'public');
    }
    public function createHealthCenter(): HealthCenter
    {
        // dd($this->input('area_id'));
        $healthCenter =
            HealthCenter::create([
                'nameEn' => $this->nameEn,
                'nameAr' => $this->nameAr,
                'address' => $this->address,
                'image' => $this->getImagePath(),
                'addressAr' => $this->addressAr,
                'description1' => $this->description1,
                'description1Ar' => $this->description1Ar,
                // 'area_id' => $this->input('area_id'),
                'scan' => $this->scan,
                'lab' => $this->lab,
                'description2' => $this->description2,
                'description2Ar' => $this->description2Ar,
                'phone' => $this->phone,
                'whatsApp' => $this->whatsApp, 'view' => $this->view,

            ]);
        $healthCenter->areas()->sync($this->input('area_id'));

        return $healthCenter;
    }
}
