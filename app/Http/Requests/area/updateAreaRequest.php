<?php

namespace App\Http\Requests\area;

use App\Models\Area;
use Illuminate\Foundation\Http\FormRequest;

class updateAreaRequest extends FormRequest
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
            'id' => 'required|exists:areas,id',
            'nameEn' => 'required|unique:areas,nameEn,' . $this->id,
            'nameAr' => 'required',
            'view' => 'required',

        ];
    }

    public function updateArea(): Area
    {
        $area = Area::findOrFail($this->id);
        $area->update([
            'id' => $this->id,
            'nameEn' => $this->nameEn,
            'nameAr' => $this->nameAr, 'view' => $this->view,

        ]);

        return $area;
    }
}
