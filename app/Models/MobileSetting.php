<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileSetting extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'name', 'nameAr', 'logo', 'background1', 'background2', 'address', 'addressAr', 'phone', 'phoneAr', 'x', 'linkedin', 'facebook', 'instagram'];

    protected $table = 'mobile_settings';
}
