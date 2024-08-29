<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Log;
use Carbon\Carbon;

class FetchWeatherData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-weather-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch weather data from database every hour';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        //
        $latestLog = DB::table('logs')->latest('created_at')->first();

        if ($latestLog) {
            // Simpan data ke cache atau ke tempat yang bisa diakses oleh frontend
            cache()->put('latest_weather_data', $latestLog, 3600); // Cache selama 1 jam
        }

        $this->info('Weather data fetched successfully.');
    }
}
