<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi plural
    // protected $table = 'venues';

    // Kolom yang bisa diisi melalui mass assignment
    protected $fillable = ['name', 'city_id'];

    /**
     * Relasi Many to One: Venue terletak di satu City.
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id'); // Menghubungkan city_id di Venue ke city_id di City
    }
}
