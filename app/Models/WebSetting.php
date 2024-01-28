<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSetting extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'name', 'nameAr', 'logo', 'favicon', 'footerLogo', 'address', 'addressAr', 'phone', 'phoneAr', 'twitter', 'linkedin', 'facebook', 'instagram'];

    protected $table = 'web_settings';
}
