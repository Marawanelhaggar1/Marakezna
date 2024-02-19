<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $fillable = ['nameEn', 'nameAr', 'descriptionEn2', 'descriptionAr2', 'descriptionEn1', 'descriptionAr1', 'image', 'icon', 'featured'];
    protected $table = 'services';

    public function serviceGroup()
    {
        return $this->hasMany(ServiceGroup::class);
    }
    public function icon()
    {
        return $this->belongsTo(Icons::class);
    }
}
