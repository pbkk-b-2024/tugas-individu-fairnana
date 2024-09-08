<?php

// app/Models/User.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Kolom yang bisa diisi melalui mass assignment
    protected $fillable = ['name', 'email', 'password', 'role_id'];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Relasi User dengan Registration (many registrations)
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    // Relasi User dengan EventFeedback (many feedbacks)
    public function feedbacks()
    {
        return $this->hasMany(EventReview::class);
    }
}
