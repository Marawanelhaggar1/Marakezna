<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubArea extends Model
{
    use HasFactory;
    protected $fillable = ['nameEn', 'nameAr', 'area_id'];

    protected $table = 'sub_areas';

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function healthCenters()
    {
        return $this->belongsToMany(
            HealthCenter::class,
            'sub_area_health_center',
            'sub_area_id',
            'health_center_id'
        );
    }
}
