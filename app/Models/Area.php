<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['nameEn', 'nameAr'];

    protected $table = 'areas';


    public function healthCenters()
    {
        return $this->belongsToMany(
            HealthCenter::class,
            'area_health_center',
            'area_id',
            'health_center_id'
        );
    }
}
