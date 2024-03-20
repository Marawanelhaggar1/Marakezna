<?php

namespace App\Http\Requests\subArea;

use App\Models\SubArea;
use Illuminate\Foundation\Http\FormRequest;

class updateSubAreaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }


    public function rules(): array
    {
        return [
            'id' => 'required|exists:sub_areas,id',
            'nameEn' => 'required',
            'nameAr' => 'required',
            'area_id' => 'required|exists:areas,id',
        ];
    }

    public function updateSubArea(): SubArea
    {
        $subArea = SubArea::findOrFail($this->id);
        $subArea->update([
            'id' => $this->id,
            'nameAr' => $this->nameAr,
            'nameEn' => $this->nameEn,
            'area_id' => $this->area_id,
        ]);
        return $subArea;
    }
}
