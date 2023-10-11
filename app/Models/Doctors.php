<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;

    protected $fillable=['الاسم','name','specialization','التخصص','image','address','health_center_id'];
    protected $table='doctors';

    public function healthCenter(){
        return $this->belongsTo(HealthCenter::class);
    }

    public function patients(){
        return $this->hasMany(Patients::class);
    }
    public function booking(){
        return $this->hasMany(Bookings::class);
    }
}
