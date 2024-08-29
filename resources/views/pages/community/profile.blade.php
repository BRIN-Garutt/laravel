<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Analytics actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Profile</h1>
            </div>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-12 gap-6">

            <!-- Bar chart (Direct vs Indirect) -->
            <!-- <x-analytics.analytics-card-04 /> -->

            <!-- Suhu chart (Top Countries) -->
            <x-profile.profile-card-01 />
            <x-profile.profile-card-02 />
            <x-profile.profile-card-03 />
            <x-profile.profile-card-04 />
        </div>
    </div>
</x-app-layout>