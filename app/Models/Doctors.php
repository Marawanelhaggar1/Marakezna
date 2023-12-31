<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;

    protected $fillable = ['nameAr', 'nameEn', 'specialization_id', 'feeEn', 'image', 'addressAr', 'health_center_id', 'titleEn', 'titleAr', 'addressEn', 'feeAr', 'ratingEn', 'ratingAr', 'waiting'];


    protected $table = 'doctors';

    public function healthCenter()
    {
        return $this->belongsTo(HealthCenter::class);
    }

    public function patients()
    {
        return $this->hasMany(Patients::class);
    }

    public function doctorSchedule()
    {
        return $this->hasMany(DoctorSchedule::class);
    }
    public function booking()
    {
        return $this->hasMany(Bookings::class);
    }
    public function visits()
    {
        return $this->hasMany(Visits::class);
    }

    public function specializationId()
    {
        return $this->belongsTo(Specialization::class);
    }
}
