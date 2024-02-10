<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icons extends Model
{
    use HasFactory;

    protected $fillable = ['image'];
    protected $table = 'icons';
    public function specialty()
    {
        return $this->hasMany(Specialization::class);
    }

    public function service()
    {
        return $this->hasMany(Services::class);
    }
}
