<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Analytics actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Analytics</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <!-- Filter button -->
                <x-dropdown-filter align="right" />

                <!-- Datepicker built with flatpickr -->
                <x-datepicker />

                <!-- Add view button -->
                <button class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                    <svg class="fill-current shrink-0 xs:hidden" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="max-xs:sr-only">Add View</span>
                </button>

            </div>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-12 gap-6">

            <!-- Line chart (Acme Plus) -->
            <x-analytics.analytics-card-01 :dataFeed="$dataFeed" />

            <!-- Line chart (Acme Advanced) -->
            <x-analytics.analytics-card-02 :dataFeed="$dataFeed" />

            <!-- Line chart (Acme Professional) -->
            <x-analytics.analytics-card-03 :dataFeed="$dataFeed" />

            <!-- Bar chart (Direct vs Indirect) -->
            <!-- <x-analytics.analytics-card-04 /> -->

            <!-- Suhu chart (Top Countries) -->
            <x-analytics.analytics-card-06 />

            <!-- Kelembapan chart (Real Time Value) -->
            <x-analytics.analytics-card-05 />

            <!-- Table (Top Channels) -->
            <x-analytics.analytics-card-07 />

            <!-- Line chart (Sales Over Time) -->
            <x-analytics.analytics-card-08 />

            <!-- Stacked bar chart (Sales VS Refunds) -->
            <x-analytics.analytics-card-09 />

            <!-- Card (Customers) -->
            <x-analytics.analytics-card-10 />

            <!-- Card (Reasons for Refunds) -->
            <x-analytics.analytics-card-11 />

            <!-- Card (Recent Activity) -->
            <x-analytics.analytics-card-12 />

            <!-- Card (Income/Expenses) -->
            <x-analytics.analytics-card-13 />
        </div>
    </div>
</x-app-layout>