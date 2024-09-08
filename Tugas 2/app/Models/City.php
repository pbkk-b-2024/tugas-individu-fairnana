<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi plural
    // protected $table = 'cities';

    // Kolom yang bisa diisi melalui mass assignment
    protected $fillable = ['name'];

    /**
     * Relasi One to Many: City memiliki banyak Venue.
     */
    public function venues()
    {
        return $this->hasMany(Venue::class, 'city_id', 'city_id'); // Menghubungkan city_id di City ke city_id di Venue
    }
}
