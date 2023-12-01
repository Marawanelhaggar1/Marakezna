<?php

namespace App\Http\Requests\servicesGroup;

use App\Models\ServiceGroup;
use Illuminate\Foundation\Http\FormRequest;

class updateServicesGroupRequest extends FormRequest
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
            'id' => 'required|exists:service_groups,id',
            'nameEn' => 'required|unique:service_groups,name,' . $this->id,
            'nameAr' => 'required',
        ];
    }

    public function updateServiceGroup(): ServiceGroup
    {
        $serviceGroup = ServiceGroup::findOrFail($this->id);
        $serviceGroup->update([
            'id' => $this->id,
            'nameAr' => $this->nameAr,
            'nameEn' => $this->nameEn,
        ]);

        return $serviceGroup;
    }
}
