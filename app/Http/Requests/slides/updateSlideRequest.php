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
            'title' => 'required',
            'titleAr' => 'required',
            'sub_title' => 'nullable',
            'sub_titleAr' => 'nullable',
            'description' => 'nullable',
            'descriptionAr' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,mp4,svg|max:4096',
            'imageAr' => 'nullable|image|mimes:jpeg,png,jpg,gif,mp4,svg|max:4096',
        ];
    }

 public function getImagePath(): string
    {
        $doctor = Slide::findOrFail($this->id);

        if ($this->hasFile('image')) {
            // Use the store() method to store the image
            return $this->file('image')->store('slides_images', 'public');
        } else {
            return $doctor->image;
        }
    }

public function getImagePathAr(): string
    {
        $doctor = Slide::findOrFail($this->id);

        if ($this->hasFile('image')) {
            // Use the store() method to store the image
            return $this->file('imageAr')->store('slides_images', 'public');
        } else {
            return $doctor->image;
        }
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
            'image' => $this->getImagePath(),
            'imageAr' => $this->getImagePathAr(),
        ]);

        return $slide;
    }
}
