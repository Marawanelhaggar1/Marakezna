<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $fillable=['name','الاسم','service_group_id'];
    protected $table='services';

    public function serviceGroupId(){
        return $this->belongsTo(ServiceGroup::class);
    }
}
