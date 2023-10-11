<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCenter extends Model
{
    use HasFactory;

   protected $fillable=['name','الاسم', 'address','image','working_hours'];
   protected $casts = [
        'working_hours' => 'array'
    ];
   protected $table='health_centers';

   public function doctors(){
    return $this->hasMany(Doctors::class);
   }

   public function patients(){
    return $this->hasMany(Patients::class);
   }

   public function booking(){
        return $this->hasMany(Bookings::class);
    }
}
