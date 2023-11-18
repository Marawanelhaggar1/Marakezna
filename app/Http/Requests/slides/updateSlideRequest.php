<?php

namespace App\Http\Requests\slides;

use App\Models\Slide;
use Illuminate\Foundation\Http\FormRequest;

class updateSlideRequest extends FormRequest
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
            'id' => 'required|exists:slides,id',
            'title' => 'required|unique:slides,name,' . $this->id,
            'titleAr' => 'required',
            'sub_title' => 'required',
            'sub_titleAr' => 'required',
            'description' => 'required',
            'descriptionAr' => 'required',
            'image' => 'required',
            'imageAr' => 'required',
        ];
    }

    public function updateSlide(): Slide
    {
        $slide = Slide::findOrFail($this->id);

        $slide->update([
            'id' => $this->id,
            'title' => $this->title,
            'titleAr' => $this->titleAr,
            'sub_title' => $this->sub_title,
            'sub_titleAr' => $this->sub_titleAr,
            'description' => $this->description,
            'descriptionAr' => $this->descriptionAr,
            'image' => $this->image,
            'imageAr' => $this->imageAr,
        ]);

        return $slide;
    }
}
