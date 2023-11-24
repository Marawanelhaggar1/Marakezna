<?php

namespace App\Http\Requests\booking;

use App\Models\Bookings;
use Illuminate\Foundation\Http\FormRequest;

class updateBookingRequest extends FormRequest
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
            'id' => 'required|exists:bookings,id',
            'patient_name' => 'required|unique:bookings,name,' . $this->id,
            'phone' => 'required',
            'diagnose' => 'nullable',
            'location' => 'nullable',
            'description' => 'nullable',
            'date' => 'required|date',
            'doctor_id' => 'required|exists:doctors,id',
            'status' => 'required',
            'health_center_id' => 'nullable|exists:health_centers,id',
        ];
    }

    public function updateBooking(): Bookings
    {
        $booking = Bookings::findOrFail($this->id);
        $booking->update([
            'id' => $this->id,
            'patient_name' => $this->patient_name,
            'phone' => $this->phone,
            'diagnose' => $this->diagnose,
            'date' => $this->date,
            'doctor_id' => $this->doctor_id,
            'status' => $this->status,
            'location' => $this->location,
            'description' => $this->description,
            'health_center_id' => $this->health_center_id,
        ]);
        return $booking;
    }
}
