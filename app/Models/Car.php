<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'brand',
        'year',
        'price_per_day',
        'matricule',
        'category',
        'status',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function client() {
        return $this->hasMany(Client::class, 'car');
    }
}
