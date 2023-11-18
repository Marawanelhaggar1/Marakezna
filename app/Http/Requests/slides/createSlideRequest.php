<?php

namespace App\Http\Requests\slides;

use App\Models\Slide;
use Illuminate\Foundation\Http\FormRequest;

class createSlideRequest extends FormRequest
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
            'title' => 'required',
            'titleAr' => 'required',
            'sub_title' => 'required',
            'sub_titleAr' => 'required',
            'description' => 'required',
            'descriptionAr' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imageAr' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function getImagePath(): string
    {
        return $this->file('image')->store('slides_images', 'public');
    }
    public function getImageArPath(): string
    {
        return $this->file('imageAr')->store('slides_images', 'public');
    }
    public function createSlide(): Slide
    {
        return Slide::create([
            'title' => $this->title,
            'titleAr' => $this->titleAr,
            'sub_title' => $this->sub_title,
            'sub_titleAr' => $this->sub_titleAr,
            'description' => $this->description,
            'descriptionAr' => $this->descriptionAr,
            'image' => $this->getImagePath(),
            'imageAr' => $this->getImageArPath(),
        ]);
    }
}
