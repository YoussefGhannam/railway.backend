<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CarSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $cars = [
            [
                'model' => 'Corolla',
                'brand' => 'Toyota',
                'year' => '2020',
                'price_per_day' => 300.00,
                'matricule' => 'ABC1234',
                'price_per_day' => 25.00,
                'category' => 'Economy',
                'status' => 'disponible',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => 'Focus',
                'brand' => 'Ford',
                'year' => '2019',
                'matricule' => 'XYZ5678',
                'price_per_day' => 300.00,
                'category' => 'SUV',
                'status' => 'disponible',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => 'Civic',
                'brand' => 'Honda',
                'year' => '2021',
                'price_per_day' => 300.00,
                'matricule' => 'LMN9012',
                'price_per_day' => 55.00,
                'category' => 'Luxury',
                'status' => 'disponible',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => 'Camry',
                'brand' => 'Toyota',
                'year' => '2022',
                'price_per_day' => 300.00,
                'matricule' => 'DEF3456',
                'price_per_day' => 65.00,
                'category' => 'Sedan',
                'status' => 'pas disponible',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => 'X5',
                'brand' => 'BMW',
                'year' => '2018',
                'matricule' => 'GHI7890',
                'price_per_day' => 300.00,
                'category' => 'Van',
                'status' => 'disponible',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => 'A4',
                'brand' => 'Audi',
                'year' => '2020',
                'price_per_day' => 300.00,
                'matricule' => 'JKL2345',
                'price_per_day' => 75.00,
                'category' => 'Coupe',
                'status' => 'pas disponible',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($cars as $car) {
            DB::table('cars')->insert($car);
        }
    }
}
