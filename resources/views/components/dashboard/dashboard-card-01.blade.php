<div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
    <div class="px-5 pt-5">
        <header class="flex justify-between items-start mb-2">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 flex items-center">
                <svg class="w-6 h-6 text-gray-800 dark:text-gray-100 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 18.363A9 9 0 0112 21a9 9 0 016.879-2.637M15 10a3 3 0 11-6 0 3 3 0 016 0zm-9 4a3 3 0 013-3h6a3 3 0 013 3v3H6v-3z" />
                </svg>
                User Registrations
            </h2>
        </header>
        <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Data Total User</div>
        <div class="flex items-start">
            <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">{{ $userCount }}</div>
        </div>
    </div>
    <!-- Chart built with Chart.js 3 -->
    <!-- Check out src/js/components/dashboard-card-01.js for config -->
    <div class="grow max-sm:max-h-[128px] xl:max-h-[128px]">
        <!-- Pass user count data to the canvas element -->
        <canvas id="dashboard-card-01" width="389" height="128" data-user-count="{{ $userCount }}"></canvas>
    </div>
</div>
