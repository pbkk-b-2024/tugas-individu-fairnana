<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    use HasFactory;

    protected $primaryKey = 'image_id';

    protected $fillable = [
        'event_id',
        'url',
    ];

    // Relasi ke model Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'event_id');
    }
}
