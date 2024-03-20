<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCenter extends Model
{
    use HasFactory;

    protected $fillable = ['nameEn', 'nameAr', 'whatsAppLink', 'address', 'image', 'logo',  'addressAr', 'description1', 'description1Ar', 'scan', 'lab', 'phone', 'whatsApp', 'description2', 'description2Ar', 'view'];

    protected $table = 'health_centers';

    public function areas()
    {
        return $this->belongsToMany(Area::class, 'area_health_center', 'health_center_id', 'area_id',);
    }
    public function subAreas()
    {
        return $this->belongsToMany(SubArea::class, 'sub_area_health_center', 'health_center_id', 'sub_area_id',);
    }
    public function doctors()
    {
        return $this->hasMany(Doctors::class);
    }

    public function doctorsSchedule()
    {
        return $this->hasMany(DoctorSchedule::class);
    }

    public function centerSchedule()
    {
        return $this->hasMany(HealthCenterSchedule::class);
    }

    public function serviceGroup()
    {
        return $this->hasMany(ServiceGroup::class);
    }

    public function patients()
    {
        return $this->hasMany(Patients::class);
    }

    public function booking()
    {
        return $this->hasMany(Bookings::class);
    }

    public function visits()
    {
        return $this->hasMany(Visits::class);
    }

    public function centerCalls()
    {
        return $this->hasMany(CenterCalls::class);
    }
}
