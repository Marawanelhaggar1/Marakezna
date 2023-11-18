<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'titleAr', 'sub_titleAr', 'sub_title', 'description', 'descriptionAr', 'image', 'imageAr',];
    protected $table = 'slides';
}
