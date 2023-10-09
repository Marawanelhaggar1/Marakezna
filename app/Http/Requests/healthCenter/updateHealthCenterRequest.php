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
            'id'=>'required|exists:health_centers,id',
            'name'=>'required|unique:health_centers,name,' .$this->id,
            'الاسم'=>'required',
            'address'=>'required',
            'image'=>'nullable',
            'working_hours'=>'required',
        ];
    }

    public function updateHealthCenter():HealthCenter{
        $health = HealthCenter::findOrFail($this->id);
        $health->update([
            'id'=>$this->id,
            'name'=>$this->name,
            'الاسم'=>$this->الاسم,
            'address'=>$this->address,
            'image'=>$this->image,
            'working_hours'=>$this->working_hours,
        ]);

        return $health;
    }
}
