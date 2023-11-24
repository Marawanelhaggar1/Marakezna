<?php

namespace App\Http\Requests\doctors;

use App\Models\Doctors;
use Illuminate\Foundation\Http\FormRequest;

class createDoctorRequest extends FormRequest
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
            'name' => 'required',
            'الاسم' => 'required',
            'specialization_id' => 'required|exists:specializations,id',
            'fee' => 'required|integer',
            'address' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'health_center_id' => 'nullable|exists:health_centers,id',
            'اللقب' => 'required',
            'title' => 'required',
            'العنوان' => 'nullable',
            'السعر' => 'required|integer',
            'rating' => 'required|integer',

        ];
    }


    public function getImagePath(): string
    {
        return $this->file('image')->store('doctors_images', 'public');
    }

    public function createDoctor(): Doctors
    {


        return Doctors::create([
            'name' => $this->name,
            'الاسم' => $this->الاسم,
            'specialization_id' => $this->specialization_id,
            'fee' => $this->fee,
            'address' => $this->address,
            'image' => $this->getImagePath(),
            'health_center_id' => $this->health_center_id,
            'title' => $this->title,
            'العنوان' => $this->العنوان,
            'اللقب' => $this->اللقب,
            'rating' => $this->rating,
            'السعر' => $this->السعر,
        ]);
    }
}
