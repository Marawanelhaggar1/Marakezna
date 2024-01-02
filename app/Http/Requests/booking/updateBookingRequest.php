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
        return auth()->user()->isUser();
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
            'patient_name' => 'required',
            'phone' => 'required',
            'diagnose' => 'nullable',
            'location' => 'nullable',
            'description' => 'nullable',
            'date' => 'required',
            'doctor_id' => 'required|exists:doctors,id',
            'status' => 'required',
            'health_center_id' => 'nullable|exists:health_centers,id',
            'payment' => 'nullable', 'user_id' => 'required|exists:users,id',
            'email' => 'required|email',

        ];
    }

    public function getTheDate($targetDay)
    {
        // Validate the target day input
        $validDaysAr = ['الأحد', 'الأثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعه', 'السبت'];
        $validDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        if (!in_array($targetDay, $validDays) && !in_array($targetDay, $validDaysAr)) {
            dd('Invalid target day. Please provide a valid day name (e.g., Sunday, Monday, etc.).');
        }

        // Get the current date
        $today = now();

        // Calculate the next occurrence of the target day
        $targetIndex = array_search($targetDay, $validDays) || array_search($targetDay, $validDaysAr);
        $nextOccurrence = $today->copy();
        $nextOccurrence->addDays(($targetIndex + 7 - $today->dayOfWeek) % 7);

        // Format the date as "dd/mm/yyyy"
        $formattedDate = $nextOccurrence->format('Y/m/d');
        // $this->schedule['date'] = $formattedDate;
        return $formattedDate;
    }
    public function updateBooking(): Bookings
    {
        $booking = Bookings::findOrFail($this->id);
        $booking->update([
            'id' => $this->id,
            'patient_name' => $this->patient_name,
            'phone' => $this->phone,
            'diagnose' => $this->diagnose,
            'date' => $this->getTheDate($this->date),
            'doctor_id' => $this->doctor_id,
            'status' => $this->status,
            'location' => $this->location,
            'description' => $this->description,
            'health_center_id' => $this->health_center_id,
            'payment' => $this->payment,
            'user_id' => $this->user_id,
            'email' => $this->email,

        ]);
        return $booking;
    }
}
