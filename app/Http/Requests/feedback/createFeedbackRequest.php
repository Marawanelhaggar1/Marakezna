<?php

namespace App\Http\Requests\feedback;

use App\Models\Feedback;
use Illuminate\Foundation\Http\FormRequest;

class createFeedbackRequest extends FormRequest
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
            'image' => 'required|image|mimes:png,jpg,svg,gif,jpeg|max:2048'
        ];
    }
    public function getImagePath(): string
    {
        return $this->file('image')->store('feedback_pics', 'public');
    }

    public function createFeedback(): Feedback
    {
        return Feedback::create([
            'image' => $this->getImagePath()
        ]);
    }
}
