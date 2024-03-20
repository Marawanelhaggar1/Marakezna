<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $fillable = ['patient_name', 'phone', 'date', 'doctor_id', 'health_center_id', 'status', 'location', 'description', 'email', 'user_id', 'time','payment'];
    protected $table = 'bookings';
    public function healthCenter()
    {
        return $this->belongsTo(HealthCenter::class);
    }

    public function doctors()
    {
        return $this->belongsTo(Doctors::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
