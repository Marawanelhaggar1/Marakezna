<?php

namespace App\Http\Requests\subArea;

use App\Models\SubArea;
use Illuminate\Foundation\Http\FormRequest;

class createSubAreaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }


    public function rules(): array
    {
        return [
            'nameEn' => 'required',
            'nameAr' => 'required',
            'area_id' => 'required|exists:sub_areas,id',
        ];
    }

    public function createSubArea(): SubArea
    {
        return SubArea::create([
            'nameAr' => $this->nameAr,
            'nameEn' => $this->nameEn,
            'area_id' => $this->area_id,
        ]);
    }
}
