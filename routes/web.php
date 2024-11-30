<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

Route::prefix('api')->group(function () {

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);


    Route::get('/dashboard/revenues', [DashboardController::class, 'getRevenues']);
    Route::get('/dashboard/upcoming_reservations', action: [DashboardController::class, 'getUpcomingReservations']);
    Route::get('/dashboard/upcoming_maintenances', action: [DashboardController::class, 'getUpcomingMaintenances']);
    Route::get('/dashboard/revenue_by_category', action: [DashboardController::class, 'getRevenueByCategory']);
    Route::get('/dashboard/revenues_and_losses', action: [DashboardController::class, 'getRevenuesAndLosses']);


    Route::get('/clients', [ClientController::class, 'index']);
    Route::post('/clients', [ClientController::class, 'store']);
    Route::put('/clients/{client}', [ClientController::class, 'update']);
    Route::delete('/clients/{client}', [ClientController::class, 'destroy']);

    Route::get('/cars', [CarController::class, 'index']);
    Route::post('/cars', [CarController::class, 'store']);
    Route::put('/cars/{car}', [CarController::class, 'update']);
    Route::delete('/cars/{car}', [CarController::class, 'destroy']);

    Route::get('/reservations', [ReservationController::class, 'index']);
    Route::post('/reservations', [ReservationController::class, 'store']);
    Route::put('/reservations/{reservation}', [ReservationController::class, 'update']);
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy']);
});

Route::get('/', function () {
    return view('welcome');
});
