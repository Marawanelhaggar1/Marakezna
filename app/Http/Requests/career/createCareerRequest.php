<?php

namespace App\Http\Requests\career;

use App\Models\Career;
use Illuminate\Foundation\Http\FormRequest;

class createCareerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return
            auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'nullable',
            'phone' => 'nullable',
            'job' => 'nullable',
            'cv' => 'required|mimes:pdf,zip',
        ];
    }

    public function getImagePath(): string
    {
        return $this->file('cv')->store('career', 'public');
    }

    public function createCareer(): Career
    {
        return Career::create([
            'job' => $this->job,
            'phone' => $this->phone,
            'email' => $this->email,
            'name' => $this->name,
            'cv' => $this->getImagePath()
        ]);
    }
}
