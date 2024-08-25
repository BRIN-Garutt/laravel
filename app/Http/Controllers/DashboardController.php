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

        // Hitung rata-rata suhu dan kelembapan
        $averageSuhu = $logs->avg('suhu');
        $averageKelembapan = $logs->avg('kelembapan');

        // Kirim variabel ke view
        return view('pages.dashboard.analytics', compact('logs', 'tanggal', 'hari', 'labels', 'suhuData', 'kelembapanData', 'averageSuhu', 'averageKelembapan'));
    }

    public function getRealtimeData(Request $request)
    {
        // Ambil nilai filter dari request
        $tanggal = $request->input('tanggal');
        $hari = $request->input('hari');
        $waktuMulai = $request->input('waktu_mulai');
        $waktuSelesai = $request->input('waktu_selesai');

        // Query data berdasarkan filter yang dipilih
        $query = DB::table('logs')->orderBy('id', 'asc');

        if ($tanggal) {
            $query->whereDate('tanggal', $tanggal);
        }

        if ($hari) {
            $query->where('hari', $hari);
        }

        if ($waktuMulai && $waktuSelesai) {
            $query->whereBetween('waktu', [$waktuMulai, $waktuSelesai]);
        }

        $logs = $query->get();

        // Siapkan data untuk chart
        $tanggal = $logs->pluck('tanggal');
        $hari = $logs->pluck('hari');
        $labels = $logs->pluck('waktu');
        $suhuData = $logs->pluck('suhu');
        $kelembapanData = $logs->pluck('kelembapan');

        // Hitung rata-rata suhu dan kelembapan
        $averageSuhu = $logs->avg('suhu');
        $averageKelembapan = $logs->avg('kelembapan');

        // Kembalikan data dalam bentuk JSON
        return response()->json([
            'tanggal' => $tanggal,
            'hari' => $hari,
            'labels' => $labels,
            'suhuData' => $suhuData,
            'kelembapanData' => $kelembapanData,
            'averageSuhu' => $averageSuhu,
            'averageKelembapan' => $averageKelembapan,
        ]);
    }

    public function filterAnalytics(Request $request)
    {
        // Ambil nilai dari input filter
        $tanggal = $request->input('tanggal');
        $hari = $request->input('hari');
        $waktuMulai = $request->input('waktu_mulai');
        $waktuSelesai = $request->input('waktu_selesai');

        // Query data berdasarkan filter yang dipilih
        $query = Log::query();

        if ($tanggal) {
            $query->whereDate('tanggal', $tanggal);
        }

        if ($hari) {
            $query->where('hari', $hari);
        }

        if ($waktuMulai && $waktuSelesai) {
            $query->whereBetween('waktu', [$waktuMulai, $waktuSelesai]);
        }

        $logs = $query->get();

        // Hitung rata-rata suhu dan kelembapan per hari
        $averageSuhu = $logs->avg('suhu');
        $averageKelembapan = $logs->avg('kelembapan');

        return view('pages.dashboard.analytics', [
            'logs' => $logs,
            'tanggal' => $logs->pluck('tanggal'),
            'hari' => $logs->pluck('hari'),
            'labels' => $logs->pluck('waktu'),
            'suhuData' => $logs->pluck('suhu'),
            'kelembapanData' => $logs->pluck('kelembapan'),
            'averageSuhu' => $averageSuhu,
            'averageKelembapan' => $averageKelembapan,
            'filterData' => $request->all() // Menyimpan data filter untuk digunakan kembali di view
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
