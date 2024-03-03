<?php

namespace App\Http\Requests\career;

use App\Models\Career;
use Illuminate\Foundation\Http\FormRequest;

class updateCareerRequest extends FormRequest
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
            'id' => 'required|exists:careers,id',
            'name' => 'required',
            'email' => 'nullable',
            'phone' => 'nullable',
            'job' => 'nullable',
            'cv' => 'required|mimes:pdf,zip',
        ];
    }

    public function getImagePath(): string
    {
        $dental = Career::findOrFail($this->id);

        if ($this->hasFile('cv')) {
            // Use the store() method to store the cv
            return $this->file('cv')->store('career', 'public');
        } else {
            return $dental->cv;
        }
    }

    public function updateCareer(): Career
    {
        $dental = Career::findOrFail($this->id);

        $dental->update([
            'id' => $this->id,
            'job' => $this->job,
            'phone' => $this->phone,
            'email' => $this->email,
            'name' => $this->name,
            'cv' => $this->getImagePath()
        ]);

        return $dental;
    }
}
