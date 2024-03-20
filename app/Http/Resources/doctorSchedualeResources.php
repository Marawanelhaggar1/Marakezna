<?php

namespace App\Http\Resources;

use App\Models\Doctors;
use App\Models\HealthCenter;
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

        $healthCenter_nameEn = null;
        $healthCenter_nameAr = null;
        $healthCenter_image = null;
        $healthCenter_id = null;
        $healthCenter = HealthCenter::find($this->center_id);
        if ($healthCenter) {
            $healthCenter_nameEn = $healthCenter->nameEn;
            $healthCenter_nameAr = $healthCenter->nameAr;
            $healthCenter_id = $healthCenter->id;

            $healthCenter_image = $healthCenter->logo;
        }
        $doctor = Doctors::findOrFail($this->doctor_id);
        $doctor_image = $doctor->image;

        $availableTime = $this->getAvailableTime($this->start_time, $this->end_time, $doctor->waiting);


        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'date' => $this->dateAr,
                'start_time' => $this->start_timeAr,
                'end_time' => $this->end_timeAr,
                'doctor_id' => $this->doctor_id,
                'center_id' => $this->center_id,
                'doctor' => [
                    'id' => $this->doctor_id,
                    'name' => $doctor->nameEn,
                    'image' => 'https://marakezna.com/storage/app/public/' . $doctor->image,
                ],
                'center' => [
                    'id' => $this->center_id,
                    'name' => $healthCenter_nameAr,
                ],

                'times' => $availableTime
            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'dateAr' => $this->dateAr,
                'start_timeAr' => $this->start_timeAr,
                'end_timeAr' => $this->end_timeAr,
                'doctor_id' => $this->doctor_id,
                'center_id' => $this->center_id,
                'timesAr' => $availableTime,
                'date' => $this->date,
                'doctor' => [
                    'id' => $this->doctor_id,
                    'name' => $doctor->nameEn,
                    'image' => 'https://marakezna.com/storage/app/public/' . $doctor->image,
                ],
                'center' => [
                    'id' => $this->center_id,
                    'name' => $healthCenter_nameEn,
                ],
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'times' => $availableTime
            ];
        } else {
            return [
                'id' => $this->id,
                'date' => $this->date,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'doctor' => [
                    'id' => $this->doctor_id,
                    'name' => $doctor->nameEn,
                    'image' => 'https://marakezna.com/storage/app/public/' . $doctor->image,
                ],
                'center' => [
                    'id' => $this->center_id,
                    'name' => $healthCenter_nameEn,
                ],
                'center_id' => $this->center_id,
                'doctor_id' => $this->doctor_id,
                'times' => $availableTime
            ];
        }
    }
}
