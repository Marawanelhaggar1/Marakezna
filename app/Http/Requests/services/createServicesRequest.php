<?php

namespace App\Http\Requests\services;

use App\Models\Services;
use Illuminate\Foundation\Http\FormRequest;

class createServicesRequest extends FormRequest
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
            'service_group_id'=>'required|exists:service_groups,id',
        ];
    }

    public function createService():Services{
        return Services::create([
            'name'=>$this->name,
            'الاسم'=>$this->الاسم,
            'service_group_id'=>$this->service_group_id,
        ]);
    }
}
