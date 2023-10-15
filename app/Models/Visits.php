<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    use HasFactory;

    protected $fillable = [
        'health_center_id', 'doctor_id', 'patient_id', 'date', 'diagnose'
    ];

    protected $table = 'visits';


    public function healthCenter()
    {
        return $this->belongsTo(HealthCenter::class);
    }

    public function doctors()
    {
        return $this->belongsTo(Doctors::class);
    }

    public function patients()
    {
        return $this->belongsTo(Patients::class);
    }
}
