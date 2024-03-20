<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;

    protected $fillable = ['nameAr', 'nameEn', 'specialization_id', 'feeEn', 'image', 'addressAr', 'health_center_id', 'titleEn', 'titleAr', 'addressEn', 'feeAr', 'ratingEn', 'ratingAr', 'waiting', 'phone', 'whatsApp', 'featured', 'appointment', 'view'];


    protected $table = 'doctors';

    public function healthCenter()
    {
        return $this->belongsToMany(HealthCenter::class, 'health_centers_doctors', 'doctor_id', 'health_center_id');
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

    public function doctorCalls()
    {
        return $this->hasMany(DoctorCalls::class);
    }

    public function centerCalls()
    {
        return $this->hasMany(CenterCalls::class);
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
