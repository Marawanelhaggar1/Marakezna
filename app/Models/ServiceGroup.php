<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceGroup extends Model
{
    use HasFactory;
    protected $fillable = ['name','الاسم'];
    protected $table = 'service_groups';

    public function services(){
        return $this->hasMany(Services::class);
    }
}
