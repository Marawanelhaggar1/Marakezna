<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewEmployees extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'nameAr', 'title', 'titleAr', 'image'];
    protected $table = 'new_employees';
}
