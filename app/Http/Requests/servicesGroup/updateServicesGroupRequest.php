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
            'name' => 'required|unique:service_groups,name,' . $this->id,
            'الاسم' => 'required',
        ];
    }

    public function updateServiceGroup(): ServiceGroup
    {
        $serviceGroup = ServiceGroup::findOrFail($this->id);
        $serviceGroup->update([
            'id' => $this->id,
            'name' => $this->name,
            'الاسم' => $this->الاسم,
        ]);

        return $serviceGroup;
    }
}
