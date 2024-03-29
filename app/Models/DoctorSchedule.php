<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'center_id',
        'date',
        'dateAr',
        'start_time',
        'start_timeAr',
        'end_time',
        'end_timeAr',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctors::class);
    }
    public function center()
    {
        return $this->belongsTo(HealthCenter::class);
    }
}
