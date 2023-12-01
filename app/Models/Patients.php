<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;

    protected $fillable = ['nameAr', 'nameEn', 'email', 'diseaseEn', 'diseaseAr', 'health_center_id', 'doctor_id', 'addressEn', 'addressAr',];

    protected $table = 'patients';

    public function healthCenter()
    {
        return $this->belongsTo(HealthCenter::class);
    }

    public function doctors()
    {
        return $this->belongsTo(Doctors::class);
    }

    public function visits()
    {
        return $this->hasMany(Visits::class);
    }
}
