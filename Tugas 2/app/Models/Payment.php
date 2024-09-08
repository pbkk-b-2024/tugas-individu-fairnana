<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'registration_id',
        'method_id',
        'amount',
        'payment_date',
    ];

    // Relasi ke model Registration
    public function registration()
    {
        return $this->belongsTo(Registration::class, 'registration_id', 'registration_id');
    }

    // Relasi ke model PaymentMethod
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'method_id', 'id');
    }
}
