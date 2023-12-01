<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCenter extends Model
{
    use HasFactory;

    protected $fillable = ['nameEn', 'nameAr', 'address', 'image',  'addressAr', 'description', 'descriptionAr'];

    protected $table = 'health_centers';

    public function doctors()
    {
        return $this->hasMany(Doctors::class);
    }

    public function centerSchedule()
    {
        return $this->hasMany(HealthCenterSchedule::class);
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
}
