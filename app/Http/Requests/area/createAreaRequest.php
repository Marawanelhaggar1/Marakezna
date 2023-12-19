<?php

namespace App\Http\Requests\area;

use App\Models\Area;
use Illuminate\Foundation\Http\FormRequest;

class createAreaRequest extends FormRequest
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
            'nameEn' => 'required|unique:areas,nameEn,' . $this->id,
            'nameAr' => 'required',
        ];
    }

    public function createArea(): Area
    {
        return Area::create([
            'nameAr' => $this->nameAr,
            'nameEn' => $this->nameEn,
        ]);
    }
}
