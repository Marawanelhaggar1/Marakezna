<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterCalls extends Model
{
    use HasFactory;

    protected $fillable = ['center_id', 'user_id'];
    protected $table = 'center_calls';

    public function centers()
    {
        return $this->belongsTo(HealthCenter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
