<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataFeed;
use App\Models\Log;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count(); // Menghitung jumlah user
        // Hitung jumlah user yang aktif dalam 5 menit terakhir dari tabel sessions
        $activeUserCount = DB::table('sessions')
            ->where('last_activity', '>=', Carbon::now()->subMinutes(5)->timestamp)
            ->count();

        return view('pages/dashboard/dashboard', compact('userCount', 'activeUserCount'));
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

    //Untuk data notifikasi
    public function getWeatherData()
    {
        $latestLog = DB::table('logs')->latest('created_at')->first();

        if ($latestLog) {
            return response()->json([
                'suhu' => $latestLog->suhu,
                'kelembapan' => $latestLog->kelembapan,
                'timestamp' => \Carbon\Carbon::parse($latestLog->created_at)->format('M d, Y H:i')
            ]);
        }

        return response()->json(['message' => 'No data available'], 404);
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
        // Format tanggal
        $tanggal = $logs->pluck('tanggal')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('d-m-Y');
        });
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

        // Format tanggal
        $tanggal = $logs->pluck('tanggal')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('d-m-Y');
        });

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
}
