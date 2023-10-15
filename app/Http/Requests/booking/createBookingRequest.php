<?php

namespace App\Http\Requests\booking;

use App\Models\Bookings;
use Illuminate\Foundation\Http\FormRequest;

class createBookingRequest extends FormRequest
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
            'patient_name' => 'required',
            'phone' => 'required',
            'date' => 'required|date',
            'doctor_id' => 'required|exists:doctors,id',
            'health_center_id' => 'required|exists:health_centers,id',
        ];
    }

    public function createBooking(): Bookings
    {
        return Bookings::create([
            'patient_name' => $this->patient_name,
            'phone' => $this->phone,
            'date' => $this->date,
            'doctor_id' => $this->doctor_id,
            'health_center_id' => $this->health_center_id
        ]);
    }
}
