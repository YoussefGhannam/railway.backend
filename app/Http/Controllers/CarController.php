<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index() {
        return Car::all();
    }

    public function store(Request $request) {
        $request->validate([
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . now()->year,
            'matricule' => 'required|string|unique:cars',
            'price_per_day' => 'required',
            'category' => 'required|in:économique,luxes,SUVs,vans',
            'status' => 'required|in:disponible,pas disponible',
        ]);

        return Car::create($request->all());
    }

    public function update(Request $request, Car $car) {
        $request->validate([
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . now()->year,
            'price_per_day' => 'required',
            'matricule' => 'required|string|unique:cars,matricule,' . $car->id,
            'category' => 'required|in:économique,luxes,SUVs,vans',
            'status' => 'required|in:disponible,pas disponible',
        ]);

        $car->update($request->all());
        return $car;
    }

    public function destroy(Car $car) {
        $car->delete();
        return response()->json(['message' => 'Car deleted']);
    }
}
