<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataFeed;

class DashboardController extends Controller
{
    public function index()
    {
        $dataFeed = new DataFeed();

        return view('pages/dashboard/dashboard', compact('dataFeed'));
    }

    /**
     * Displays the analytics screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function analytics()
    {
        $dataFeed = new DataFeed();
        // Mengambil 5 data suhu terbaru dari tabel tbl_sensor
        $temperatures = DB::table('tbl_sensor')
            ->orderBy('id', 'desc')
            ->take(5)
            ->get(['suhu', 'created_at'])
            ->reverse(); // Reverse untuk menampilkan data dari yang paling lama ke yang paling baru

        // Mengirim data suhu ke view
        return view('pages/dashboard/analytics', compact('temperatures', 'dataFeed'));
    }
    // Method untuk mengambil data suhu terbaru
    public function getLatestTemperature()
    {
        // Mengambil data terbaru dari database
        $latestTemperature = DB::table('tbl_sensor')->orderBy('id', 'desc')->first();

        // Mengembalikan data dalam format JSON
        return response()->json($latestTemperature);
    }

    /**
     * Displays the fintech screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function fintech()
    {
        return view('pages/dashboard/fintech');
    }
}
