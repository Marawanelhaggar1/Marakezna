<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCenterSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'center_id',
        'date',
        'dateAr',
        'start_time',
        'start_timeAr',
        'end_time',
        'end_timeAr',
    ];

    public function center()
    {
        return $this->belongsTo(HealthCenter::class);
    }
}
