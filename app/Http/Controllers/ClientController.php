<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        return Client::with('car')->orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request) {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'cin' => 'required|string|unique:clients',
            'car' => 'required',
            'days' => 'required|integer',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'telephone' => 'required|string|max:15',
        ]);

        return Client::create($request->all());
    }

    public function update(Request $request, Client $client) {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'cin' => 'required|string|unique:clients,cin,' . $client->id,
            'car' => 'required',
            'days' => 'required|integer',
            'date_debut' => 'nullable',
            'date_fin' => 'nullable',
            'telephone' => 'required|string|max:15',
        ]);

        $client->update($request->all());
        return $client;
    }
    public function destroy(Client $client) {
        $response = $client->delete();
        return response()->json([
            'message' => 'Client deleted',
            'status' => $response
        ]);
    }
}
