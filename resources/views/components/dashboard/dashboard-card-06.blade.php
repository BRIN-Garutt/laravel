<div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
    <div class="px-5 pt-5">
        <header class="flex justify-between items-start mb-2">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 flex items-center">
                <img src="{{ asset('images/icon_user.png') }}" alt="User Icon" class="w-6 h-6 mr-2">
                Data User Aktif
            </h2>
        </header>
        <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">User Aktif Saat Ini</div>
        <div class="flex items-start">
            <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">{{ $activeUserCount }}</div>
            <!-- Status Indicator -->
            <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse mr-2"></div>
        </div>
    </div>
    <!-- Chart built with Chart.js 3 -->
    <!-- Check out src/js/components/dashboard-card-active-user.js for config -->
    <div class="grow max-sm:max-h-[128px] xl:max-h-[128px]">
        <!-- Pass active user count data to the canvas element -->
        <canvas id="dashboard-card-06" width="389" height="128" data-active-user-count="{{ $activeUserCount }}"></canvas>
    </div>
</div>
