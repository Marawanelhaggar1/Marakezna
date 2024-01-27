<?php

namespace App\Http\Requests\icons;

use App\Models\Icons;
use Illuminate\Foundation\Http\FormRequest;

class upateIconsRequest extends FormRequest
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
            'id' => 'required|exists:icons,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }

    public function getImagePath(): string
    {
        $icon = Icons::findOrFail($this->id);

        if ($this->hasFile('image')) {
            // Use the store() method to store the image
            return $this->file('image')->store('icons_svg', 'public');
        } else {
            return $icon->image;
        }
    }

    public function updateIcon(): Icons
    {
        $icon = Icons::findOrFail($this->id);

        $icon->update([
            'id' => $this->id,
            'image' => $this->getImagePath()
        ]);

        return $icon;
    }
}
