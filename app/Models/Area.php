<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['nameEn', 'nameAr'];

    protected $table = 'areas';


    protected function center()
    {
        return $this->hasMany(HealthCenter::class);
    }
}
