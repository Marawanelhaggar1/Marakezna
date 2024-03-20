<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $fillable = ['nameEn', 'nameAr', 'service_group_id', 'descriptionEn', 'descriptionAr', 'image', 'icon', 'featured'];
    protected $table = 'services';

    public function serviceGroupId()
    {
        return $this->belongsTo(ServiceGroup::class);
    }
    public function icon()
    {
        return $this->belongsTo(Icons::class);
    }
}
