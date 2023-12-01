<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceGroup extends Model
{
    use HasFactory;
    protected $fillable = ['nameEn', 'nameAr'];
    protected $table = 'service_groups';

    public function services()
    {
        return $this->hasMany(Services::class);
    }
}
