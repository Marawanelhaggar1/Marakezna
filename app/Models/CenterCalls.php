<?php

namespace App\Models;

use App\Http\Resources\servicesGroupResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterCalls extends Model
{
    use HasFactory;

    protected $fillable = ['center_id', 'user_id', 'doctor_id', 'service_id', 'user_name', 'user_email', 'user_mobile', 'status'];
    protected $table = 'center_calls';

    public function centers()
    {
        return $this->belongsTo(HealthCenter::class);
    }

    public function services()
    {
        return $this->belongsTo(servicesGroupResource::class);
    }
    public function doctors()
    {
        return $this->belongsTo(Doctors::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
