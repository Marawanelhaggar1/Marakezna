<?php

namespace App\Http\Requests\booking;

use App\Models\Bookings;
use App\Models\User;
use App\Notifications\Booking;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Notification;

class updateBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = auth()->user();
        // dd($user);
        // logger()->info('User Details:', ['user' => $user]);

        // Check if a user is authenticated and call isUser() if true
        return $user && $user->isUser();
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
            //'diagnose' => 'nullable',
            //'location' => 'nullable',
            //'description' => 'nullable',
            // 'date' => 'nullable',
            'time' => 'required',
            'doctor_id' => 'required|exists:doctors,id',
            'status' => 'required',
            // 'health_center_id' => 'nullable|exists:health_centers,id',
            'payment' => 'nullable',
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

        $today = now();

        // Calculate the next occurrence of the target day
        $targetIndex = array_search($targetDay, $validDays);
        if ($targetIndex === false) {
            $targetIndex = array_search($targetDay, $validDaysAr);
        }
        $daysUntilNext = ($targetIndex + 7 - $today->dayOfWeek) % 7;
        $nextOccurrence = $today->copy()->addDays($daysUntilNext);

        // Format the date as "dd/mm/yyyy"
        $formattedDate = $nextOccurrence->format('Y/m/d');
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
            'date' => $this->date ? $this->getTheDate($this->date) : $booking->date,
            'doctor_id' => $this->doctor_id,
            'status' => $this->status,
            'location' => $this->location,
            'description' => $this->description,
            'health_center_id' => $this->health_center_id,
            'payment' => $this->payment,
            'email' => $this->email, 'time' => $this->time,


        ]);
        $users = User::where('role', 'admin')->get();
        $booking_id = $booking->id;
        Notification::send($users, new Booking($booking_id));
        return $booking;
    }
}
