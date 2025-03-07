<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        return response()->json([
            'message' => 'Localisation reçue avec succès',
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
    }
}