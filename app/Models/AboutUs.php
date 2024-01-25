<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'title', 'titleAr', 'paragraph', 'paragraphAr', 'mission', 'missionAr', 'values', 'valuesAr', 'vision', 'visionAr', 'videoLink'];
    protected $table = 'about_us';
}
