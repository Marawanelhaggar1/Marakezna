<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    public $fillable = ['specialtyEn', 'specialtyAr', 'icon', 'image'];
    public $table = 'specializations';

    public function specialization()
    {
        return $this->hasMany(Specialization::class);
    }

    public function image()
    {
        return $this->belongsTo(Icons::class);
    }

    // public function scopeSelection($query)
    // {
    //     return $query->select('id', );
    // }
}
