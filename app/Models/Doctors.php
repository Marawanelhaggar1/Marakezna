<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;

    protected $fillable=['الاسم','name','Specialization','image','address','health_center_id'];
    protected $table='doctors';

    public function healthCenter(){
        return $this->belongsTo(HealthCenter::class);
    }

    public function patients(){
        return $this->hasMany(Patients::class);
    }
}
