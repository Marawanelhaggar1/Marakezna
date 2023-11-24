<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    public $fillable = ['specialization', 'التخصص', 'icon'];
    public $table = 'specializations';

    public function specialization()
    {
        return $this->hasMany(Specialization::class);
    }
}
