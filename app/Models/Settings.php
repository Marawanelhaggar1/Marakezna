<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'nameAr', 'logo', 'favicon', 'footerLogo', 'address', 'addressAr', 'phone', 'phoneAr', 'instagram', 'x', 'facebook', 'linkedin', 'mobile_background'];
    protected $table = 'settings';
}
