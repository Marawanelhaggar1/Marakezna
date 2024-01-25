<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'paragraph1', 'paragraph1Ar', 'paragraph2', 'paragraph2Ar'];
    protected $table = 'about_us';
}
