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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'الاسم'=>'required',
            'specialization'=>'required',
            'التخصص'=>'required',
            'address'=>'required',
            'image'=>'required',
            'health_center_id'=>'required|exists:health_centers,id',

        ];
    }

    public function createDoctor():Doctors{
        return Doctors::create([
            'name'=>$this->name,
            'الاسم'=>$this->الاسم,
            'specialization'=>$this->specialization,
            'التخصص'=>$this->التخصص,
            'address'=>$this->address,
            'image'=>$this->image,
            'health_center_id'=>$this->health_center_id,
        ]);
    }
}
