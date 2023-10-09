<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;

    protected $fillable=['الاسم','name','email','المرض','disease','health_center_id','doctor_id'];

    protected $table = 'patients';

    public function healthCenter(){
        return $this->belongsTo(HealthCenter::class);
    }

    public function doctors(){
        return $this->belongsTo(Doctors::class);
    }
}
