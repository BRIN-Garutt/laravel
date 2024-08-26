<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class SensorController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'api_key' => 'required|string',
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
        ]);

        // Verifikasi API key
        if ($request->input('api_key') !== env('PROJECT_API_KEY')) {
            return response()->json(['error' => 'Invalid API key'], 403);
        }

        // Simpan data ke tabel logs
        Log::create([
            'suhu' => $request->input('temperature'),
            'kelembapan' => $request->input('humidity'),
            'tanggal' => now()->toDateString(),
            'hari' => now()->format('l'),
            'waktu' => now()->toTimeString(),
        ]);

        return response()->json(['success' => 'Data saved successfully'], 200);
    }
    // Method to retrieve sensor data
    public function index()
    {
        // Retrieve all sensor data from the logs table
        $logs = Log::all();

        // Return the data as JSON
        return response()->json($logs);
    }
}
