<?php

namespace App\Http\Requests\NewEmployee;

use App\Models\NewEmployees;
use Illuminate\Foundation\Http\FormRequest;

class createNewEmployeeRequest extends FormRequest
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
            'nameAr' => 'required',
            'title' => 'required',
            'titleAr' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function getImagePath(): string
    {
        return $this->file('image')->store('new_employee', 'public');
    }

    public function createNewEmployee(): NewEmployees
    {
        return NewEmployees::create([
            'title' => $this->title,
            'titleAr' => $this->titleAr,
            'name' => $this->name,
            'nameAr' => $this->nameAr,
            'image' => $this->getImagePath()
        ]);
    }
}
