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
// <?php
// namespace App\Http\Controllers;
// use App\Models\Client;
// use App\Http\Requests\StoreClientRequest;
// use App\Http\Requests\UpdateClientRequest;

// class ClientController extends Controller
// {
//     public function index() {
//         return Client::with('car')->orderBy('created_at', 'desc')->get();
//     }
//     public function store(StoreClientRequest $request, Client $client) {
//         $client = Client::create($request->validated());
//         return apiResponse($client, 'Client created successfully');
//     }
//     public function update(UpdateClientRequest $request, Client $client) {
//         $client = Client::create($request->validated());
//         return apiResponse($client, 'Client updated successfully');
//     }
//     public function destroy(Client $client) {
//         $client->delete();
//         return apiResponse(null, 'Client deleted successfully');
//     }
// }
