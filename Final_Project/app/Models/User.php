<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    // Hidden attributes
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Cast attributes
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Define the default role for a new user.
     */
    protected static function boot()
    {
        parent::boot();

        // Set default role as 'user' when creating a new user
        static::creating(function ($user) {
            if (empty($user->role)) {
                $user->role = 'user';
            }
        });
    }

    /**
     * Relasi User dengan Registrations (many registrations).
     */
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    /**
     * Relasi User dengan EventFeedback (many feedbacks).
     */
    // public function feedbacks()
    // {
    //     return $this->hasMany(EventFeedback::class); // Assuming the correct model name is `EventFeedback`
    // }
}
