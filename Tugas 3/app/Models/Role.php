<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Nama tabel, jika tidak mengikuti konvensi Laravel, bisa diaktifkan
    // protected $table = 'roles'; 

    // Kolom yang dapat diisi melalui mass assignment
    protected $fillable = ['name'];

    /**
     * Relasi One to Many: Role memiliki banyak User.
     */
    public function users()
    {
        // Menghubungkan 'role_id' di tabel users ke 'id' di tabel roles
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
