<?php

namespace App\Http\Requests\servicesGroup;

use App\Models\ServiceGroup;
use Illuminate\Foundation\Http\FormRequest;

class createServicesGroupRequest extends FormRequest
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
        ];
    }

    public function createServiceGroup():ServiceGroup{
        return ServiceGroup::create([
            'name'=>$this->name,
            'الاسم'=>$this->الاسم,
        ]);
    }
}
