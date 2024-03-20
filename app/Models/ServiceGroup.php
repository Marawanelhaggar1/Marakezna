<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceGroup extends Model
{
    use HasFactory;
    protected $fillable = ['nameEn', 'nameAr', 'center_id'];
    protected $table = 'service_groups';

    public function healthCenter()
    {
        return $this->belongsTo(HealthCenter::class);
    }
    public function centerCalls()
    {
        return $this->hasMany(CenterCalls::class);
    }
}
