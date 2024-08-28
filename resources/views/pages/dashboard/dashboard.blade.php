<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Dashboard</h1>
            </div>

        </div>

        <!-- Cards -->
        <div class="grid grid-cols-12 gap-6">
            <!-- First Row: Data User Aktif, Data Total User, Chart Rata-rata Suhu, Chart Rata-rata Kelembapan -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                <x-dashboard.dashboard-card-06 :activeUserCount="$activeUserCount" />
            </div>
            <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                <x-dashboard.dashboard-card-01 :userCount="$userCount" />
            </div>
            <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                <x-dashboard.dashboard-card-02 />
            </div>
            <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                <x-dashboard.dashboard-card-03 />
            </div>

            <!-- Second Row: Realtime Chart Suhu and Kelembapan -->
            <div class="col-span-12 lg:col-span-6">
                <x-dashboard.dashboard-card-04 />
            </div>
            <div class="col-span-12 lg:col-span-6">
                <x-dashboard.dashboard-card-05 />
            </div>
        </div>

    </div>
</x-app-layout>