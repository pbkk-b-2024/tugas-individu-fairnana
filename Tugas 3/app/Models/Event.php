<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'event_id';

    protected $fillable = [
        'title',
        'category_id',
        'description',
        'registration_date',
        'event_date',
        'venue_id',
    ];

    // Relasi ke model Registration
    public function registrations()
    {
        return $this->hasMany(Registration::class, 'event_id', 'event_id');
    }

    // Relasi ke model Ticket
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'event_id', 'event_id');
    }

    // Relasi ke model EventImage
    public function eventImages()
    {
        return $this->hasMany(EventImage::class, 'event_id', 'event_id');
    }

    // Relasi ke model EventFeedback
    // public function eventFeedbacks()
    // {
    //     return $this->hasMany(EventFeedback::class, 'event_id', 'event_id');
    // }

    // Relasi ke model EventCategory
    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'id');
    }

    // Relasi ke model Venue
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id', 'id');
    }
}
