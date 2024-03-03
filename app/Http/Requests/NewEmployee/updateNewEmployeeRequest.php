<?php

namespace App\Http\Requests\NewEmployee;

use App\Models\NewEmployees;
use Illuminate\Foundation\Http\FormRequest;

class updateNewEmployeeRequest extends FormRequest
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
            'id' => 'required|exists:new_employees,id',
            'name' => 'required',
            'nameAr' => 'required',
            'title' => 'required',
            'titleAr' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function getImagePath(): string
    {
        $dental = NewEmployees::findOrFail($this->id);

        if ($this->hasFile('image')) {
            // Use the store() method to store the image
            return $this->file('image')->store('new_employee', 'public');
        } else {
            return $dental->image;
        }
    }

    public function updateNewEmployee(): NewEmployees
    {
        $dental = NewEmployees::findOrFail($this->id);

        $dental->update([
            'id' => $this->id,
            'title' => $this->title,
            'titleAr' => $this->titleAr,
            'name' => $this->name,
            'nameAr' => $this->nameAr,
            'image' => $this->getImagePath()
        ]);

        return $dental;
    }
}
