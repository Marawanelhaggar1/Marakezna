<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $fillable=['patient_name','phone','date','doctor_id','health_center_id'];
    protected $table='bookings';
    public function healthCenter(){
        return $this->belongsTo(HealthCenter::class);
    }

    public function doctors(){
        return $this->belongsTo(Doctors::class);
    }
}
