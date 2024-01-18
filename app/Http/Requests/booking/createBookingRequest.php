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
            'patient_name' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required|date_format:H:i',
            'diagnose' => 'nullable',
            'location' => 'nullable',
            'description' => 'nullable',
            'doctor_id' => 'required|exists:doctors,id',
            'health_center_id' => 'nullable|exists:health_centers,id',
            'status' => 'required',
            'user_id' => 'required|exists:users,id',
            'email' => 'required|email',
            'payment' => 'nullable'
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

    public function createBooking(): Bookings
    {

        // dd($this->getTheDate($this->date));
        return Bookings::create([
            'patient_name' => $this->patient_name,
            'phone' => $this->phone,
            'user_id' => $this->user_id,
            'email' => $this->email,
            'date' => $this->getTheDate($this->date),
            'diagnose' => $this->diagnose,
            'time' => $this->time,
            'doctor_id' => $this->doctor_id,
            'health_center_id' => $this->health_center_id,
            'status' => $this->status,
            'location' => $this->location,
            'payment' => $this->payment,
            'description' => $this->description,
        ]);
    }
}
