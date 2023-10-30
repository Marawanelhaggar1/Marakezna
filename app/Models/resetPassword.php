<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resetPassword extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'token'];

    protected $primaryKey = 'email';

    protected $table = 'password_reset_tokens';
}
