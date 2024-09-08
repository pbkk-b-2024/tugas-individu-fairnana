<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReview extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the plural form of the model name
    protected $table = 'event_reviews';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'review_id';

    // If the primary key is not auto-incrementing
    public $incrementing = true;

    // If the primary key is not an integer
    protected $keyType = 'int';

    // Allow mass assignment for these fields
    protected $fillable = [
        'event_id',
        'user_id',
        'review',
    ];

    // Relationships
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
