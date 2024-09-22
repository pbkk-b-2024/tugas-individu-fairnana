<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'name',
    ];

    // Relasi ke model Event
    public function events()
    {
        return $this->hasMany(Event::class, 'category_id', 'category_id');
    }
}
