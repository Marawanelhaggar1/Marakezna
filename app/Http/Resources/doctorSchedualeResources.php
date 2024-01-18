<?php

namespace App\Http\Resources;

use App\Models\Doctors;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use DateTime;
use DateInterval;
use DatePeriod;

class doctorSchedualeResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    function getAvailableTime($start_time, $end_time, $interval_minutes)
    {
        $available_time = array();

        $interval = new DateInterval('PT' . $interval_minutes . 'M'); // Dynamic interval
        $start = new DateTime($start_time);
        $end = new DateTime($end_time);
        $end->modify('+1 second'); // Include the end time

        $periods = new DatePeriod($start, $interval, $end);

        foreach ($periods as $period) {
            $available_time[] = $period->format('H:i:s');
        }

        return $available_time;
    }

    public function toArray(Request $request): array
    {
        $doctor = Doctors::findOrFail($this->doctor_id);
        $availableTime = $this->getAvailableTime($this->start_time, $this->end_time, $doctor->waiting);


        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'date' => $this->dateAr,
                'start_time' => $this->start_timeAr,
                'end_time' => $this->end_timeAr,
                'doctor_id' => $this->doctor_id,
                'times' => $availableTime
            ];
        } else {
            return [
                'id' => $this->id,
                'date' => $this->date,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'doctor_id' => $this->doctor_id,
                'times' => $availableTime
            ];
        }
    }
}
