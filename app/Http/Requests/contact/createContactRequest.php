<?php

namespace App\Http\Requests\contact;

use App\Models\Contact;
use Illuminate\Foundation\Http\FormRequest;

class createContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
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
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'description' => 'required',
        ];
    }

    public function createContact(): Contact
    {
        return Contact::create([
            'name' => $this->name,
            'description' => $this->description,
            'subject' => $this->subject,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);
    }
}
