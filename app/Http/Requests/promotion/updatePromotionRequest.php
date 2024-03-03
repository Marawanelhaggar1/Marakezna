<?php

namespace App\Http\Requests\promotion;

use App\Models\Promotion;
use Illuminate\Foundation\Http\FormRequest;

class updatePromotionRequest extends FormRequest
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
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'titleAr' => 'required',
            'description' => 'required',
            'descriptionAr' => 'required',
            'id' => 'required|exists:promotions,id',
        ];
    }

    public function getImage1Path(): string
    {
        $dental = Promotion::findOrFail($this->id);

        if ($this->hasFile('image1')) {
            // Use the store() method to store the image
            return $this->file('image1')->store('promotion', 'public');
        } else {
            return $dental->image1;
        }
    }

    public function getImage2Path(): string
    {
        $dental = Promotion::findOrFail($this->id);

        if ($this->hasFile('image2')) {
            // Use the store() method to store the image
            return $this->file('image2')->store('promotion', 'public');
        } else {
            return $dental->image2;
        }
    }

    public function updatePromotion(): Promotion
    {
        $dental = Promotion::findOrFail($this->id);

        $dental->update([
            'id' => $this->id,
            'title' => $this->title,
            'titleAr' => $this->titleAr,
            'description' => $this->description,
            'descriptionAr' => $this->descriptionAr,
            'image1' => $this->getImage1Path(),
            'image2' => $this->getImage2Path()
        ]);

        return $dental;
    }
}
