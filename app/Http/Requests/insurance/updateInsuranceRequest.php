<?php

namespace App\Http\Requests\insurance;

use App\Models\Insurance;
use Illuminate\Foundation\Http\FormRequest;

class updateInsuranceRequest extends FormRequest
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
            'id' => 'required|exists:insurances,id',
            'name' => 'required|unique:insurances,name,' . $this->id,
            'percentage' => 'required',
            'percentageAr' => 'required',
            'nameAr' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function getImagePath(): string
    {
        return $this->file('image')->store('insurance_images', 'public');
    }

    public function updateInsurance(): Insurance
    {
        $insurance = Insurance::findOrFail($this->id);

        $insurance->update([
            'id' => $this->id,
            'name' => $this->name,
            'nameAr' => $this->nameAr,
            'percentage' => $this->percentage,
            'percentageAr' => $this->percentageAr,
            'image' => $this->getImagePath()
        ]);

        return $insurance;
    }
}
