<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
// use App\Http\Resources\CarResource;

class CarController extends Controller
{
    public function index() {
        return Car::orderBy('created_at', 'desc')->get();
    }
    public function store(StoreCarRequest $request) {
        $car = Car::create($request->validated());
        return apiResponse($car, 'Car created successfully');
    }
    public function update(UpdateCarRequest $request, Car $car) {
        $car->update($request->validated());
        return apiResponse($car, 'Car updated successfully');
    }
    public function destroy(Car $car) {
        $car->delete();
        return apiResponse(null, 'Car deleted successfully');
    }
}
