<?php

namespace App\Http\Requests\icons;

use App\Models\Icons;
use Illuminate\Foundation\Http\FormRequest;

class createIconsRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function getImagePath(): string
    {
        return $this->file('image')->store('icons_svg', 'public');
    }

    public function createIcon(): Icons
    {
        return Icons::create([
            'image' => $this->getImagePath()
        ]);
    }
}
