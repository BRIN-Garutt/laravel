<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataFeed;
use App\Models\Log;

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
        // Ambil data dari tabel log atau tabel lain yang sesuai
        $logs = Log::all();

        // Siapkan data untuk chart (contohnya seperti sebelumnya)
        $tanggal = $logs->pluck('tanggal');
        $hari = $logs->pluck('hari');
        $labels = $logs->pluck('waktu'); // Atau kolom lain yang ingin ditampilkan
        $suhuData = $logs->pluck('suhu');
        $kelembapanData = $logs->pluck('kelembapan');

        // Kirim variabel ke view
        return view('pages.dashboard.analytics', compact('logs', 'tanggal', 'hari', 'labels', 'suhuData', 'kelembapanData'));
    }

    public function getRealtimeData()
    {
        // Ambil data terbaru dari tabel logs
        // $logs = Log::latest()->take(5)->get();
        //memastikan data yang ditampilkan itu ascending
        $logs = DB::table('logs')->orderBy('id', 'asc')->get();

        // Siapkan data untuk chart
        $tanggal = $logs->pluck('tanggal');
        $hari = $logs->pluck('hari');
        $labels = $logs->pluck('waktu');
        $suhuData = $logs->pluck('suhu');
        $kelembapanData = $logs->pluck('kelembapan');

        // Kembalikan data dalam bentuk JSON
        return response()->json([
            'tanggal' => $tanggal,
            'hari' => $hari,
            'labels' => $labels,
            'suhuData' => $suhuData,
            'kelembapanData' => $kelembapanData,
        ]);
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
