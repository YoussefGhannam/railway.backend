<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
    public function rules()
    {
        return [
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . now()->year,
            'matricule' => 'required|string|unique:cars',
            'price_per_day' => 'required|numeric',
            'category' => 'required|in:Economy,SUV,Luxury,Sedan,Van,Coupe',
            'status' => 'required|in:disponible,pas disponible',
        ];
    }
}
