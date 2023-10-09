<?php

namespace App\Http\Requests\healthCenter;

use App\Models\HealthCenter;
use Illuminate\Foundation\Http\FormRequest;

class createHealthCenterRequest extends FormRequest
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
            'address'=>'required',
            'image'=>'nullable',
            'working_hours'=>'required',
        ];
    }

    public function createHealthCenter():HealthCenter{
        return HealthCenter::create([
            'name'=>$this->name,
            'الاسم'=>$this->الاسم,
            'address'=>$this->address,
            'image'=>$this->image,
            'working_hours'=>$this->working_hours,
        ]);
    }
}
