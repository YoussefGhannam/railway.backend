<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Client;
use App\Models\Car;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('client', 'car')->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $clients = Client::all();
        $cars = Car::where('status', 'disponible')->get();
        return view('reservations.create', compact('clients', 'cars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:confirmed,pending,cancelled',
        ]);

        $reservation = Reservation::create($request->all());

        // Optionally, update the car status to unavailable
        $reservation->car->update(['status' => 'pas disponible']);

        return redirect()->route('reservations.index')->with('success', 'Reservation added successfully!');
    }

    public function edit(Reservation $reservation)
    {
        $clients = Client::all();
        $cars = Car::all();
        return view('reservations.edit', compact('reservation', 'clients', 'cars'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:confirmed,pending,cancelled',
        ]);

        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully!');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully!');
    }
}
