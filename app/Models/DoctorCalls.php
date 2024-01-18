<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorCalls extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_id', 'user_id'];
    protected $table = 'doctor_calls';

    public function doctors()
    {
        return $this->belongsTo(Doctors::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
