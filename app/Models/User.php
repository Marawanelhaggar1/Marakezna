<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'mobile',
        'date_of_birth',
        'gender',
        'email',
        'password',
        'social_id',
        'role',
	'whatsApp',
        'image',
        'address',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin()
    {
        return $this->role == 'admin';
    }
    public function isDoctor()
    {
        return $this->role == 'doctor';
    }
    public function isUser()
    {
        return $this->role == 'admin' || $this->role == 'user' || $this->role == 'doctor';
    }

    public function booking()
    {
        return $this->hasMany(Bookings::class);
    }

    public function doctorCalls()
    {
        return $this->hasMany(DoctorCalls::class);
    }

    public function centerCalls()
    {
        return $this->hasMany(CenterCalls::class);
    }
}
