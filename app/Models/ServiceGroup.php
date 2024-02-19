<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceGroup extends Model
{
    use HasFactory;
    protected $fillable = ['nameEn', 'nameAr', 'services_id'];
    protected $table = 'service_groups';

    public function services()
    {
        return $this->belongsTo(Services::class);
    }
}
