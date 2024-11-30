<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'age',
        'cin',
        'status',
        'telephone',
        'car',
        'days',
        'date_debut',
        'date_fin'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function car() {
        return $this->belongsTo(Car::class, 'car');
    }
}
